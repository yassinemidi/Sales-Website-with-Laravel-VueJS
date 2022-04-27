<template>
    
        
        <div>
        <input type="file" class="custom-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar" @change="onFileChange" />
        <div class="ml-5">
            <img v-if="url" :src="url" class="img-fluid " width="180" style="height: 200px;">
        </div>

        </div>
    
</template>

<script>
export default {
    data() {
        return{
            url:''
        }
    },

    methods:{
        onFileChange(e){
            const file=e.target.files[0];
            this.url=URL.createObjectURL(file);
        }
    }
}
</script>