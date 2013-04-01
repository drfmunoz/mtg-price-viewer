<?php echo $this->Html->script("actions");?>
<?php echo $this->element('ga'); ?>
<div id="addStore-form" class="dialogForm"  title="<?php echo $this->LangManager->get('add_store_title');?>" >
    <form id="store_add_form">
        <fieldset>
            <label for="storeUrl"><?php echo $this->LangManager->get('input_store_url');?></label>
            <input class="url required" type="text" name="storeUrl" id="storeUrl" placeholder="<?php echo $this->LangManager->get('store_url_sample');?>"/>
            <input type="hidden" name="key" id="keyId" value="<?php echo $key;?>"/>
        </fieldset>
        <span id="storeError" class="formError"></span>
        <br>
        <button id="addStoreAction" class="button"><?php echo $this->LangManager->get('store_add');?></button>
        <button id="cancelAddStore" class="button button-alt"><?php echo $this->LangManager->get('cancel');?></button>
    </form>
</div>

<div id="addFeedback-form" class="dialogForm" title="<?php echo $this->LangManager->get('send_feedback');?>">
    <form>
        <fieldset>
            <label for="email"><?php echo $this->LangManager->get('input_email_address');?></label>
            <input type="text" name="email" id="email" placeholder="<?php echo $this->LangManager->get('mail_sample');?>"/>
            <label for="message"><?php echo $this->LangManager->get('input_message');?></label>
            <textarea name="message" id="message" placeholder="<?php echo $this->LangManager->get('input_message_placeholder');?>"></textarea>
        </fieldset>
        <span id="feedbackError" class="formError"></span>
        <br>
        <button id="sendFeedbackAction" class="button"><?php echo $this->LangManager->get('send');?></button>
        <button id="cancelFeedback" class="button button-alt"><?php echo $this->LangManager->get('cancel');?></button>
    </form>
</div>

<div id="subscribe-form" class="dialogForm" title="<?php echo $this->LangManager->get('price_subscribe');?>">
    <form>
        <fieldset>
            <label for="uname"><?php echo $this->LangManager->get('input_name');?></label>
            <input type="text" name="uname" id="uname" placeholder="<?php echo $this->LangManager->get('input_name_sample');?>"/>
            <label for="uemail"><?php echo $this->LangManager->get('input_email_address');?></label>
            <input type="text" name="uemail" id="uemail" placeholder="<?php echo $this->LangManager->get('mail_sample');?>"/>
          </fieldset>
        <span id="subscribeError"  class="formError"></span>
        <br>
        <button id="subscribe" class="button"><?php echo $this->LangManager->get('send');?></button>
        <button id="cancelSubscribe" class="button button-alt"><?php echo $this->LangManager->get('cancel');?></button>
    </form>
</div>

<div id="thankDialog" title="<?php echo $this->LangManager->get('thank_you');?>" class="dialogForm">
    <p><?php echo $this->LangManager->get('team_thanks');?></p>
</div>
<div class="dialogForm">
    <span id="storeErrorMessage" class="formError"><?php echo $this->LangManager->get('add_store_error');?></span>
    <span id="mailErrorMessage" class="formError"><?php echo $this->LangManager->get('mail_error');?></span><br>
    <span id="feedbackMessageError" class="formError"><?php echo $this->LangManager->get('message_error');?></span>
    <span id="nameError" class="formError"><?php echo $this->LangManager->get('name_error');?></span>
</div>


</body>
</html>