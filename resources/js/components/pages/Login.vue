<template>
  <div>
    <div>
      Login
    </div>
    <div>
      <form @submit.prevent="login">
        <div class="mb-3">
          <label for="InputEmail" class="form-label">Email address</label>
          <input type="email" class="form-control" id="InputEmail" v-model="loginForm.email">
        </div>
        <div class="mb-3">
          <label for="InputPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="InputPassword" v-model="loginForm.password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
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
    methods: {
      login() {
        this.$store.dispatch('auth/login', this.loginForm);
        this.$router.push('/');
      }
    }
  }

</script>
