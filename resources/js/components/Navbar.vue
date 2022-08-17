<template>
  <div>
    <div>
      <RouterLink to="/">
        GreenLibrary
      </RouterLink>
    </div>
    <div v-if="! isLogin">
      <div>
        <RouterLink to="/login">
          ログイン
        </RouterLink>
      </div>
      <div>
        <RouterLink to="/register">
          会員登録
        </RouterLink>
      </div>
    </div>
    <div v-if="isLogin">
      <div>
        <RouterLink to="/store">
          植物登録
        </RouterLink>
      </div>
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
