<template>
  <div>
    <div>
      <RouterLink to="/">
        GreenLibrary
      </RouterLink>
    </div>
    <div v-if="! isLogin">
      <RouterLink to="/login">
        ログイン
      </RouterLink>
    </div>
  </div>
</template>

<script>
  export default {
    computed: {
      isLogin() {
        return this.$store.getters['auth/check'];
      },
      username() {
        return this.$store.getters['auth/username'];
      },
    },
  }

</script>
