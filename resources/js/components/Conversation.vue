<template>
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 d-flex">
            <div class="card flex-fill">
                <div class="chat_window body">
                    <!-- header -->
                    <div class="chat-header">
                        <div class="user">
                            
                            <div class="chat-about">
                                <div class="chat-with">{{sellerName}}</div>
                                
                                
                            </div>
                        </div>
                        <div class="setting">
                            <a v-if="selectedUserId" class="btn" data-toggle="modal" data-target="#destroyConversation"><i class="fas fa-trash-alt"></i></a>

                            <!-- Modal -->
                            <div class="modal fade" id="destroyConversation" tabindex="-1" aria-labelledby="destroyConversationLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="destroyConversationLabel">Delete Conversation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sur ? this action is makat3awdch
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a :href="'/message/user/delete/'+selectedUserId" class="btn btn-danger">Yes, Delete it</a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <p v-if="!selectedUserId" class="text-center h5"> Please select the user to chat.</p>
                    <!-- endheader -->
                    <!-- body -->
                    <ul class="chat-history" v-chat-scroll>
                        <!-- user msg -->
                        <div
                            v-for="(msg,index) in message" :key="index"
                        >

                        
                        <li class="clearfix"
                            v-if="msg.selfOwned"
                      >
                            
                            <div class="message other-message float-right">
                               <p>{{msg.body}}</p>
                                <div class="attachment">
                                    <img 
                                     v-if="msg.image0"
                                    :src="'storage/'+msg.image0.replace('public','')" alt="" class="img-fluid img-thumbnail">
                                    <img 
                                     v-if="msg.image1"
                                    :src="'storage/'+msg.image1.replace('public','')" alt="" class="img-fluid img-thumbnail">
                                    <img 
                                     v-if="msg.image2"
                                    :src="'storage/'+msg.image2.replace('public','')" alt="" class="img-fluid img-thumbnail">
                                </div>
                                <span class="time">{{moment(msg.created_at).calendar()}}</span>
                            </div>
                        </li>
                        <!-- end user msg -->

                        <!-- seller msg -->
                        <li v-else >
                            <div class="status message-data">
                                <span class="name" ><img v-if="msg.sender.avatar" :src="'storage/'+msg.sender.avatar.replace('public','')" alt="avatar" width="40" class="rounded-circle"/> {{msg.sender['first_name']}}</span>
                            </div>
                            <div class="message my-message bg-light">
                                <p class="text-center" v-if="msg.ads">
                                <a :href=" 'view/product/' + msg.ads.id " target="_blank" >
                                {{msg.ads.name}}
                                <img :src="'storage/'+msg.ads.image_0.replace('public','')" alt="" class="img-fluid ml-5" width="80">
                                <hr>

                                </a>
                            
                                </p>
                                
                                <p>{{msg.body}}</p>
                                <div class="attachment">
                                    <img 
                                     v-if="msg.image0"
                                    :src="'storage/'+msg.image0.replace('public','')" alt="" class="img-fluid img-thumbnail">
                                    <img 
                                     v-if="msg.image1"
                                    :src="'storage/'+msg.image1.replace('public','')" alt="" class="img-fluid img-thumbnail">
                                    <img 
                                     v-if="msg.image2"
                                    :src="'storage/'+msg.image2.replace('public','')" alt="" class="img-fluid img-thumbnail">
                                </div>
                                <span class="time ">{{moment(msg.created_at).calendar()}}</span>
                            </div>
                        </li>

                        <!-- end seller msg -->
                        </div>
                    </ul>

                    <div v-if="selectedUserId" class="chat-box">
                        <div class="input-group">
                           
                            <a class="btn" onclick="document.getElementById('upl_img1').click()"><i class="fa fa-camera"></i></a>
                            <a class="btn" onclick="document.getElementById('upl_img2').click()"><i class="fa fa-camera"></i></a>
                            <a class="btn" onclick="document.getElementById('upl_img3').click()"><i class="fa fa-camera"></i></a>
                            
                                
                            <input id="upl_img1" type="file"  name="image0" @change="onFileChange1" hidden >
                            <input id="upl_img2" type="file"  name="image1" @change="onFileChange2" hidden >
                            <input id="upl_img3" type="file" name="image2" @change="onFileChange3"  hidden >

                            <input type="text" class="form-control" placeholder="Enter text here..." v-model="body" required>
                            
                            <button class="btn btn-primary" v-on:click=" submit">Send</button>

                            
                        </div>
                        <div class="attachment">
                            <img v-if="url1" :src="url1" class="img-fluid img-thumbnail" width="150" style="height: 180px;">
                            <img v-if="url2" :src="url2" class="img-fluid img-thumbnail" width="150" style="height: 180px;">
                            <img v-if="url3" :src="url3" class="img-fluid img-thumbnail" width="150" style="height: 180px;">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-4 col-md-12 d-flex">
            <div class="card flex-fill">
                <div class="body">
                    <div class="chat_list" id="chat_list">
                        <div class="input-group justify-content-center">
                            <h5 class="text-center">Users</h5>
                        </div>
                        <hr>
                        <ul class="user_list list list-unstyled mb-0 mt-3">
                            <li v-for="(user,index) in users" :key="index" @click.prevent="showMessage(user.id)">
                                <div><img v-if="user.avatar" :src="'storage/'+user.avatar.replace('public','')" alt="avatar" /></div>
                                <div class="about">
                                    <div class="name">
                                        <a href="#">{{user.first_name}} {{user.last_name}}</a>
                                    </div>
                                    

                                </div>
                                
                            </li>
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import moment from 'moment';
export default {
    data() {
        return{
            url1:'',
            url2:'',
            url3:'',

           file1:'',
           file2:'',
           file3:'',
           body:'',

            sellerName:'',
            users:[],
            message:[],
            selectedUserId:'',

            moment:moment,

            
        }
    },

    mounted(){
        axios.get('/users').then((response)=>{
            this.users=response.data;
        });

        
    },

    methods:{

        onFileChange1(e){
            const file=e.target.files[0];
            this.url1=URL.createObjectURL(file);
            this.file1 = file;
        },
        onFileChange2(e){
            const file=e.target.files[0];
            this.url2=URL.createObjectURL(file);
            this.file2 = file;
        },
        onFileChange3(e){
            const file=e.target.files[0];
            this.url3=URL.createObjectURL(file);
            this.file3 = file;
        },

        showMessage(id){
              setInterval(()=>{
                  axios.get('/message/user/'+id).then((response)=>{
                this.message=response.data;
                this.selectedUserId=id;
                if(this.message[0].user_id==this.selectedUserId){
                    this.sellerName=this.message[0].sender.first_name + ' ' + this.message[0].sender.last_name;
                }else{
                    this.sellerName=this.message[0].receiver.first_name + ' ' + this.message[0].receiver.last_name;
                }
                

            })
            
             },600);
            
        },

         submit(){
             let formData = new FormData();
             formData.append('image0', this.file1);
             formData.append('image1', this.file2);
             formData.append('image2', this.file3);
             formData.append('receiverId', this.selectedUserId);
             formData.append('body', this.body);
             axios.post( '/start-conversation',
                formData,
                {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
              }
            ).then((response)=>{
                this.message.push(response.data);
                this.body='';
                this.file1='';
                this.file2='';
                this.file3='';
                this.url1='';
                this.url2='';
                this.url3='';

            })
         }


        
    }
}
</script>