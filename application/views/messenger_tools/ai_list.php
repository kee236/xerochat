<?php 
  $this->load->view("include/upload_js"); 

  $image_upload_limit = 1; 
  if($this->config->item('messengerbot_image_upload_limit') != '')
  $image_upload_limit = $this->config->item('messengerbot_image_upload_limit'); 

?>

<style type="text/css">
  .button-outline
  {
    background: #fff;
    border: .5px dashed #ccc;
  }
  .button-outline:hover
  {
    border: 1px dashed #6777EF !important;
    cursor: pointer;
  }
  .multi_layout{margin:0;background: #fff}
  .multi_layout .card{margin-bottom:0;border-radius: 0;}
  .multi_layout p, .multi_layout ul:not(.list-unstyled), .multi_layout ol{line-height: 15px;}
  .multi_layout .list-group li{padding: 15px 10px 12px 25px;}
  .multi_layout{border:.5px solid #dee2e6;}
  .multi_layout .collef,.multi_layout .colmid,.multi_layout .colrig{padding-left: 0px; padding-right: 0px;}
  .multi_layout .collef,.multi_layout .colmid{border-right: .5px solid #dee2e6;}
  .multi_layout .main_card{min-height: 500px;box-shadow: none;}
  .multi_layout .collef .makeScroll{max-height: 790px;overflow:auto;}
  .multi_layout .list-group{padding-top:6px;}
  .multi_layout .list-group .list-group-item{border-radius: 0;border:.5px solid #dee2e6;border-left:none;border-right:none;cursor: pointer;z-index: 0;}
  .multi_layout .list-group .list-group-item:first-child{border-top:none;}
  .multi_layout .list-group .list-group-item:last-child{border-bottom:none;}
  .multi_layout .list-group .list-group-item.active{border:.5px solid #6777EF;}
  .multi_layout .mCSB_inside > .mCSB_container{margin-right: 0;}
  .multi_layout .card-statistic-1{border-radius: 0;}
  .multi_layout h6.page_name{font-size: 14px;}
  .multi_layout .card .card-header input{max-width: 100% !important;}
  .multi_layout .waiting,.modal_waiting {height: 100%;width:100%;display: table;}
  .multi_layout .waiting i,.modal_waiting i{font-size:60px;display: table-cell; vertical-align: middle;padding:30px 0;}
  .multi_layout .card .card-header h4 a{font-weight: 700 !important;}  
  .product-item .product-name{font-weight: 500;}
  .badge-status{border-color:#eee;}
  /* #right_column_title i{font-size: 17px;} */

  ::placeholder {
    color: #ccc !important;
  }
  .smallspace{padding: 10px 0;}
  .lead_first_name,.lead_last_name,.lead_tag_name{background: #fff !important;}
  .getstarted_lead_first_name,.getstarted_lead_last_name,.getstarted_lead_tag_name{background: #fff !important;}
  .ajax-file-upload-statusbar{width: 100% !important;}
  hr{margin-top: 10px;}
 .custom-top-margin{margin-top: 20px;}
 .sync_page_style{margin-top: 8px;}
  /* .wrapper,.content-wrapper{background: #fafafa !important;} */
  .well{background: #fff;}  
  .emojionearea, .emojionearea.form-control{height: 140px !important;}
  .emojionearea.small-height{height: 140px !important;}

  /*import bot modal section*/
  .radio_check{display:block;position:relative;padding-left:35px;cursor:pointer;font-size:22px;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}
  .radio_check input{position:absolute;opacity:0;cursor:pointer}
  .checkmark{position:absolute;top:0px;right:0;height:18px;width:18px;background-color:#ccc;}
  .radio_check:hover input~.checkmark{background-color:#eee}
  .radio_check input:checked~.checkmark{background-color:#2196F3}.checkmark:after{content:"";position:absolute;display:none}
  .radio_check input:checked~.checkmark:after{display:block}
  .radio_check .checkmark:after{top:5px;left:5px;width:8px;height:8px;border-radius:50%;background:#fff}
  .template_sec{border:1px solid #dcd7d7;border-top-right-radius:6px;border-bottom-right-radius:6px;padding-right:0;overflow: hidden;}
  .template_img_section img{border-top-left-radius:6px;border-bottom-left-radius:6px}
  .template_body_section{height:94px;padding:3px 10px 0 10px;border-left:none}
  .description_section{font-size:10px;text-align:justify}
  .author-box .author-box-name { font-size: 14px;}
  .author-box .author-box-picture { width:80px;}

  .type3 .ajax-upload-dragdrop{text-align: center;}
  .type3 .ajax-file-upload-filename{width:100% !important;}

  .select2-container--default .select2-selection--multiple .select2-selection__choice {
      background: #fff;
      color: #6777ef;
      height: 30px;
      line-height: 27px;
      border: 1px solid #6777ef !important;
  }

</style>


<section class="section">
  <div class="section-header">
    <h1><i class="fa fa-cogs"></i> <?php echo $page_title;?></h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url('messenger_bot/bot_menu_section'); ?>"><?php echo $this->lang->line("Messenger Bot");?></a></div>
      <div class="breadcrumb-item"><?php echo $page_title;?></div>
    </div>
    </div>
</section>


<?php if(empty($page_info))
{ ?>

<div class="card" id="nodata">
  <div class="card-body">
    <div class="empty-state">
      <img class="img-fluid" style="height: 200px" src="<?php echo base_url('assets/img/drawkit/drawkit-nature-man-colour.svg'); ?>" alt="image">
       <h2 class="mt-0"><?php echo $this->lang->line("We could not find any page.");?></h2>
      <p class="lead"><?php echo $this->lang->line("Please import account if you have not imported yet.")."<br>".$this->lang->line("If you have already imported account then enable bot connection for one or more page to continue.") ?></p>
      <a href="<?php echo base_url('social_accounts'); ?>" class="btn btn-outline-primary mt-4"><i class="fas fa-arrow-circle-right"></i> <?php echo $this->lang->line("Continue");?></a>
    </div>
  </div>
</div>

<?php 
}
else
{ ?>
  <div class="row multi_layout">

    <div class="col-12 col-md-5 col-lg-3 collef">
      <div class="card main_card">
        <div class="card-header">
          <div class="col-6 padding-0">
            <h4><i class="fas fa-newspaper"></i> <?php echo $this->lang->line("Pages"); ?></h4>
          </div>
          <div class="col-6 padding-0">            
            <input type="text" class="form-control float-right" id="search_page_list" onkeyup="search_in_ul(this,'page_list_ul')" autofocus placeholder="<?php echo $this->lang->line('Search...'); ?>">
          </div>
        </div>
        <div class="card-body padding-0">
          <div class="makeScroll">
            <ul class="list-group" id="page_list_ul">
              <?php $i=0; foreach($page_info as $value) { ?> 
                <li class="list-group-item <?php if($i==0) echo 'active'; ?> page_list_item" page_table_id="<?php echo $value['id']; ?>">
                  <div class="row">
                    <div class="col-3 col-md-2"><img width="45px" class="rounded-circle" src="<?php echo $value['page_profile']; ?>"></div>
                    <div class="col-9 col-md-10">
                      <h6 class="page_name"><?php echo $value['page_name']; ?></h6>
                      <span class="gray fb_page_id"><?php echo $value['page_id']; ?></span>
                      </div>
                    </div>
                </li> 
                <?php $i++; } ?>                
            </ul>
          </div>
        </div>
      </div>          
    </div>

    <div class="col-12 col-md-7 col-lg-3 colmid" id="middle_column">

      <div class="text-center waiting">
        <i class="fas fa-spinner fa-spin blue text-center"></i>
      </div>

      <div id="middle_column_content"></div>
    </div>

    <div class="col-12 col-md-12 col-lg-6 colrig" id="right_column">

      <div class="text-center waiting">
        <i class="fas fa-spinner fa-spin blue text-center"></i>
      </div>

      <div class="card main_card">
        <div class="card-header padding-left-10 padding-right-10">
          <div class="col-6 padding-0">
            <h4 id="right_column_title"></h4>            
          </div>
          <div class="col-6 padding-0">
            <a href="#" data-toggle="dropdown" class="btn btn-outline-primary dropdown-toggle float-right"><?php echo $this->lang->line("Bot Settings Data");?></a> 
            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
              <div class="dropdown-title"><?php echo $this->lang->line("Actions");?></div>
              <li><a class="dropdown-item has-icon analytics_bot" href="#"><i class="fas fa-chart-pie"></i> <?php echo $this->lang->line("Data Analytics");?></a></li>
              <?php 
              if($this->session->userdata('user_type') == 'Admin' || in_array(257,$this->module_access)) : ?>
              <li><a class="dropdown-item has-icon tree_bot" href="#"><i class="fas fa-sitemap"></i> <?php echo $this->lang->line("Data Tree View");?></a></li>
              <li><a class="dropdown-item has-icon export_bot" table_id="" href="#"><i class="fas fa-file-export"></i> <?php echo $this->lang->line("Data Export");?></a></li>
              <li><a class="dropdown-item has-icon import_bot" table_id="" href="#"><i class="fas fa-file-import"></i> <?php echo $this->lang->line("Data Import");?></a></li>
              <?php endif; ?>
           </ul>
          </div>
        </div>

        <div class="card-body" style="padding: 10px 17px 10px 10px;">
          <div class="row">
            <div class="col-12">

              <div id="right_column_content">              
                <iframe src="" frameborder="0" width="100%" onload="resizeIframe(this)"></iframe>

                <div id="right_column_bottom_content" style="display: none;">

                  <div class="" id="enable_start_button_modal" data-backdrop="static" data-keyboard="false" style="display: none; padding: 0px;">
                      <div class="modal-dialog modal-full" style="margin: 0 !important; min-width: 100%;">
                          <div class="modal-content no_shadow">
                              <div class="modal-body padding-0" id="enable_start_button_modal_body">

                                  <div class="form-group">
                                    <label><?php echo $this->lang->line('status');?></label>
                                    <select class="form-control" name="started_button_enabled" id="started_button_enabled">
                                      <option value="1"><?php echo $this->lang->line("enabled");?></option>
                                      <option value="0"><?php echo $this->lang->line("disabled");?></option>
                                    </select>
                                  </div>


                                  <div class=""  id="delay_con2">
                                    <div class="form-group">
                                      <label>
                                        <?php echo $this->lang->line('Welcome Message');?>
                                        <a href="#" data-placement="bottom" data-html="true"  data-toggle="popover" data-trigger="focus" title="<?php echo $this->lang->line("Welcome Message") ?>" data-content="<?php echo $this->lang->line("The greeting text on the welcome screen is your first opportunity to tell a person why they should start a conversation with your Messenger bot. Some things you might include in your greeting text might include a brief description of what your bot does, such as key features, or a tagline. This is also a great place to start establishing the style and tone of your bot.Greetings have a 160 character maximum, so keep it concise.")."<br><br>".$this->lang->line("Variables")." : <br>{{user_first_name}}<br>{{user_last_name}}<br>{{user_full_name}}"; ?>">&nbsp;&nbsp;<i class='fa fa-info-circle'></i> </a>
                                      </label>


                                        <span class='float-right'> 
                                          <a title="<?php echo $this->lang->line("You can include {{user_last_name}} variable inside your message. The variable will be replaced by real names when we will send it.") ?>" data-toggle="tooltip" data-placement="top" class='btn-sm getstarted_lead_last_name button-outline'><i class='fa fa-user'></i> <?php echo $this->lang->line("last name") ?></a>
                                        </span>
                                        <span class='float-right'> 
                                          <a title="<?php echo $this->lang->line("You can include {{user_first_name}} variable inside your message. The variable will be replaced by real names when we will send it.") ?>" data-toggle="tooltip" data-placement="top" class='btn-sm getstarted_lead_first_name button-outline'><i class='fa fa-user'></i> <?php echo $this->lang->line("first name") ?></a>
                                        </span> 

                                        <div class="clearfix"></div>      

                                      <textarea name="welcome_message" id="welcome_message" class="form-control" style="height:100px;"></textarea>

                                    </div>
                                  </div>

                                  <div> 
                                      <a href="#" target="_BLANK" id="enable_start_button_submit" class="btn-lg btn btn-primary float-left"><i class="fa fa-check-circle"></i> <?php echo $this->lang->line("save");?></a>

                                      <a href="#" class="btn btn-warning float-right iframed" id="getstarted_button_edit_url"><i class="far fa-edit"></i> <?php echo $this->lang->line("Edit Get Started Reply");?></a>             
                                  </div>
                                  <div class="clearfix"></div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="" id="mark_seen_chat_settings" data-backdrop="static" data-keyboard="false" style="display: none; padding: 0px;">
                      <div class="modal-dialog modal-full" style="margin: 0 !important; min-width: 100%;">
                          <div class="modal-content no_shadow">
                              <div class="modal-body padding-0 ">

                                    <div class="form-group">
                                      <label><?php echo $this->lang->line('Mark as seen status');?></label>
                                      <select class="form-control" name="mark_seen_status" id="mark_seen_status">
                                        <option value="1"><?php echo $this->lang->line("enabled");?></option>
                                        <option value="0"><?php echo $this->lang->line("disabled");?></option>
                                      </select>
                                    </div>


                                    <div class="form-group">
                                      <label>
                                        <?php echo $this->lang->line('Chat with human Email');?>
                                      </label>
                                      <input type="text" class="form-control" name="chat_human_email" id="chat_human_email">
                                    </div>

                                    <div class="form-group">
                                      <label class="custom-switch">
                                        <input type="checkbox" name="no_match_found_reply" value="enabled" id="no_match_found_reply" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description"><?php echo $this->lang->line('Reply if no match found');?></span>
                                      </label>
                                    </div>

                                    <?php if($this->session->userdata('user_type') == 'Admin' || in_array(265,$this->module_access)) : ?>
                                    <div>
                                      <div class="section">                
                                        <h2 class="section-title"><?php echo $this->lang->line('MailChimp Integration'); ?> <span style="font-size: 12px !important;"><a href="<?php echo base_url('email_auto_responder_integration/mailchimp_list'); ?>" target="_BLANK"><?php echo $this->lang->line('Add MailChimp API'); ?></a></span></h2>
                                        <p><?php echo $this->lang->line('Send collected email from Quick Reply to your MailChimp account list. Page Name will be added as Tag Name in your MailChimp list.'); ?></p>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label style="width: 100%;">
                                        <?php echo $this->lang->line("Select MailChimp List"); ?>
                                        <a href="" class="text-danger float-right error_log_report2" data-type="Email Autoresponder"><i class="fas fa-history"></i> <?php echo $this->lang->line('API Log'); ?></a>                                        
                                      </label>
                                      <select class="form-control select2" id="mailchimp_list_id" name="mailchimp_list_id[]" multiple="">
                                        <?php 
                                        // echo "<option value='0'>".$this->lang->line('Choose a List')."</option>";
                                        foreach ($mailchimp_list as $key => $value) 
                                        {
                                          echo '<optgroup label="'.addslashes($value['tracking_name']).'">';
                                          foreach ($value['data'] as $key2 => $value2) 
                                          {
                                            if(in_array($value2['table_id'], $selected_mailchimp_list_ids)) $selected = 'selected';
                                            else $selected = '';
                                            echo "<option value='".$value2['table_id']."' ".$selected.">".$value2['list_name']."</option>";
                                          }
                                          echo '</optgroup>';
                                        } ?>
                                      </select>
                                    </div> 
                                    <?php endif; ?>

                                    <?php if($this->session->userdata('user_type') == 'Admin' || in_array(264,$this->module_access)) : ?>
                                    <div>
                                      <div class="section">                
                                        <h2 class="section-title"><?php echo $this->lang->line('SMS Integration'); ?> <span style="font-size: 12px !important;"><a href="<?php echo base_url('sms_email_manager/sms_api_lists'); ?>" target="_BLANK"><?php echo $this->lang->line('Add SMS API'); ?></a></span></h2>
                                        <p><?php echo $this->lang->line('Send automated SMS to users who provide phone number through Quick Reply.'); ?></p>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label style="width: 100%;">
                                        <?php echo $this->lang->line("Select SMS API"); ?>
                                        <a href="" class="text-danger float-right error_log_report2" data-type="SMS Sender"><i class="fas fa-history"></i> <?php echo $this->lang->line('API Log'); ?></a>                                        
                                      </label>

                                      <select class="form-control select2" id="sms_api_id" name="sms_api_id">
                                        <option value=''><?php echo $this->lang->line('Select API');?></option>
                                        <?php 
                                            foreach($sms_option as 