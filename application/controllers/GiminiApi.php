<?php
// ... (ส่วนอื่นๆ ของ Controller)

class AiSettingsController extends BaseController
{
    // ... (ฟังก์ชันอื่นๆ ที่มีอยู่แล้ว)

    // Gemini Integration

    public function gemini_list()
    {
        // ... (เหมือนเดิม)
    }

    public function gemini_grid_data()
    {
        // ... (เหมือนเดิม)
    }

    public function gemini_add() 
    {
        // ... ตรวจสอบ request และ validation

        $apiKey = strip_tags($this->input->post('api_key'));

        // ตรวจสอบ API key กับ Gemini API โดยใช้ library
        $this->load->library('gemini_api');
        $gemini = $this->gemini_api;
        if (!$gemini->validateApiKey($apiKey)) {
            return $this->customJsonResponse($this->lang->line('Invalid Gemini API key.'));
        }

        try {
            $this->db->trans_begin();

            $this->basic->insert_data('gemini_config', [ 
                'user_id' => $this->user_id,
                'api_key' => $apiKey,
                'model' => 'gemini-pro', // หรือรับค่า model จาก form ถ้ามี
                'status' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            $this->db->trans_commit();
        } catch (\Exception $e) {
            $this->db->trans_rollback();
            log_message('error', 'Unable to add Gemini API key.');
            return $this->customJsonResponse($e->getMessage());
        }

        $this->_insert_usage_log(265,1); // ปรับ id ของ log ให้เหมาะสม
        return $this->customJsonResponse($this->lang->line('Your Gemini API key has been added successfully.'), true);
    }

    // ... (ฟังก์ชันอื่นๆ เช่น gemini_edit, gemini_delete, gemini_details)
}


public function handleChat($userId, $message) {
    // ... (ดึงการตั้งค่าและ prompt)

    // ดึงข้อมูล Gemini API จากฐานข้อมูล
    $geminiConfig = DB::table('gemini_config')
        ->where('user_id', $userId)
        ->where('status', '1')
        ->first();

    if (!$geminiConfig) {
        return 'Gemini API not configured.'; // หรือแจ้งเตือนผู้ใช้ให้ตั้งค่า API
    }

    $geminiApi = new GeminiApi($geminiConfig->api_key);
    $response = $geminiApi->generateText($prompt, $geminiConfig->model, [
        // ... other options
    ]);

    // ... (บันทึกและส่งกลับ response)
}

////. Line Notify Controller 




class ChatbotController extends Controller
{
    // ... (ฟังก์ชันอื่นๆ)

    public function handleChat($userId, $message) {
        // ... (logic for getting response from AI)

        // ส่งการแจ้งเตือนผ่าน LINE Notify (ถ้ามีการตั้งค่า)
        $this->sendLineNotifyNotification($userId, $response);

        // ... (บันทึกและส่งกลับ response)
    }

    protected function sendLineNotifyNotification($userId, $message) {
        $lineNotifyConfig = DB::table('line_notify_config')
            ->where('user_id', $userId)
            ->where('status', '1')
            ->first();

        if ($lineNotifyConfig) {
            $lineNotifyApi = new LineNotifyApi($lineNotifyConfig->access_token);
            $lineNotifyApi->sendNotification($message);
        }
    }
}



