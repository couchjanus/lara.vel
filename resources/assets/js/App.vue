<template>
  <div class="col-md-8" id="blog">
    <div class="card mb-4">
      <router-link v-for="post in posts" :key="post.id" active-class="is-active" class="link" :to="{ name: 'post', params: { id: post.id } }">
          {{post.id}}. {{post.title}}
      </router-link>

    <!-- Pagination -->
    <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="3" @paginate="fetchPosts()"></pagination>

    </div>
    <div class="content">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'
  export default {
    data() {
      return{
        posts: [],
        pagination: {
            'current_page': 1
        }
    }
    },

    methods: {
        fetchPosts() {
            axios.get('blogposts?page=' + this.pagination.current_page)
                .then(response => {
                    this.posts = response.data.data.data;
                    this.pagination = response.data.pagination;
                })
                .catch(error => {
                    console.log(error.response.data);
                });
        }
    },

    mounted() {
        this.fetchPosts();
    }
    
  }
</script>
