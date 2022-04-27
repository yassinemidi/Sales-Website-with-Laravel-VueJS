<template>
  <div>
    <p v-if="showViewConversationOnSuccess">

    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn btn-danger"
      data-toggle="modal"
      data-target="#sendmessage"
    >
    <i class="fas fa-comment-dots"></i>
      Send Message
    </button>
    </p>
    <p v-else>
      <a href="/message">
        <button
            type="button"
            class="btn btn-success"
      
        >
          <i class="fas fa-comments"></i> View Conversation
        </button>
         </a>
        </p>

    <!-- Modal -->
    <div
      class="modal fade"
      id="sendmessage"
      data-backdrop="static"
      data-keyboard="false"
      tabindex="-1"
      aria-labelledby="sendmessageLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="sendmessageLabel">Send message to {{sellerName}}</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <textarea name="message_body"  cols="30" rows="5" class="form-control" placeholder="Please write your message ..." v-model="body"></textarea>
              <p v-if="successMessage" style="color:green">Your message has been sent.</p>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-danger" v-on:click="sendMessage()">Send Message</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
    export default {
        props:[
            'sellerName',
            'userId',
            'receiverId',
            'adId',
        
        ],
        data() {
          return {
              body: "",
              successMessage:false,
              showViewConversationOnSuccess:true,
              
          };
        },
         methods: {
            sendMessage()
            {
                if(this.body==''){
                    alert('please write your message');
                    //this.$toaster.warning('please write your message.', {timeout: 8000})

                    return;

                }


              axios.post('/send/message',{
                body:this.body,
                receiverId:this.receiverId,
                userId:this.userId,
                adId:this.adId
            }).then((response)=>{
            
                this.body=''
                this.successMessage=true,
                this.showViewConversationOnSuccess=false
            });
                
            }
         }

    };
</script>