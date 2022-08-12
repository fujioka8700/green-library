<template>
  <div>
    <div>
      ログイン
    </div>
    <div>
      <form @submit.prevent="login">
        <div v-if="loginErrors">
          <ul v-if="loginErrors.email">
            <li v-for="msg in loginErrors.email" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="loginErrors.password">
            <li v-for="msg in loginErrors.password" :key="msg">{{ msg }}</li>
          </ul>
        </div>
        <div class="mb-3">
          <label for="InputEmail" class="form-label">Email address</label>
          <input type="email" class="form-control" id="InputEmail" v-model="loginForm.email">
        </div>
        <div class="mb-3">
          <label for="InputPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="InputPassword" v-model="loginForm.password">
        </div>
        <button type="submit" class="btn btn-primary">ログイン</button>
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        loginForm: {
          email: 'a@a',
          password: 'aabbccddeeff',
        }
      }
    },
    created() {
      this.clearError();
    },
    computed: {
      apiStatus() {
        return this.$store.state.auth.apiStatus;
      },
      loginErrors() {
        return this.$store.state.auth.loginErrorMessages;
      },
    },
    methods: {
      async login() {
        await this.$store.dispatch('auth/login', this.loginForm);

        if (this.apiStatus) {
          this.$router.push('/');
        }
      },
      clearError() {
        this.$store.commit('auth/setLoginErrorMessages', null);
      },
    },
  }

</script>
