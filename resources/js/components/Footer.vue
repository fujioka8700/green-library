<template>
  <div v-if="isLogin">
    <span @click="logout">ログアウト</span>
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
      logout() {
        this.$store.dispatch('auth/logout');

        this.$router.push('/login');
      }
    }
  }

const a = [
        'isLogin', 'auth/check'
]
console.log(...a)
</script>
