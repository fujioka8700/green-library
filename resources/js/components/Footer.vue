<template>
  <div v-if="isLogin">
    <a href="" @click="logout">ログアウト</a>
  </div>
</template>

<script>
  import {
    mapGetters
  } from 'vuex';

  export default {
    computed: {
      ...mapGetters({
        isLogin: 'auth/check'
      }),
    },
    methods: {
      async logout() {
        await this.$store.dispatch('auth/logout');

        this.$router.push('/login');
      },
    },
  }

</script>
