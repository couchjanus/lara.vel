<template lang="html">
  <div class="post" v-if="post">
    <h1 class="post__title">{{ post.title }}</h1>
    <p class="post__body">{{ post.content }}</p>
    <p  class="post__id">{{ post.id }}</p>
  </div>
</template>

<script>
  import axios from 'axios';
  export default {
    props: ['id'],
    data() {
      return {
        post: null,
        endpoint: '/blogposts/',
      }
    },
    methods: {
      getPost(id) {
        axios(this.endpoint + id)
          .then(response => {
            this.post = response.data
          })
          .catch( error => {
            console.log('-----error-------');
            console.log(error)
          })
      }
    },
    
    created() {
      this.getPost(this.id);
    },
    watch: {
      '$route'() {
        this.getPost(this.id);
      }
    }
  }
</script>
