<template>
  <div v-if="isLogin">
    <button type="button" class="btn btn-outline-secondary" @click="logout">ログアウト</button>
  </div>
</template>

<script>
  import {
    mapState,
    mapGetters
  } from 'vuex';

  export default {
    computed: {
      ...mapState({
        apiStatus: state => state.auth.apiStatus,
      }),
      ...mapGetters({
        isLogin: 'auth/check',
      }),
    },
    methods: {
      async logout() {
        await this.$store.dispatch('auth/logout');

        if (this.apiStatus) {
          this.$router.push('/login');
        }
      },
    },
  }

</script>
