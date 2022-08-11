<template>
  <div>
    <div>
      会員登録
    </div>
    <div>
      <form @submit.prevent="register">
        <div v-if="registerErrors">
          <ul v-if="registerErrors.email">
            <li v-for="msg in registerErrors.email" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="registerErrors.name">
            <li v-for="msg in registerErrors.name" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="registerErrors.password">
            <li v-for="msg in registerErrors.password" :key="msg">{{ msg }}</li>
          </ul>
        </div>
        <div class="mb-3">
          <label for="InputName" class="form-label">Name</label>
          <input type="text" class="form-control" id="InputName" v-model="registerForm.name">
        </div>
        <div class="mb-3">
          <label for="InputEmail" class="form-label">Email address</label>
          <input type="email" class="form-control" id="InputEmail" v-model="registerForm.email">
        </div>
        <div class="mb-3">
          <label for="InputPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="InputPassword" v-model="registerForm.password">
        </div>
        <div class="mb-3">
          <label for="InputPasswordConfirmation" class="form-label">Password Confirmation</label>
          <input type="password" class="form-control" id="InputPasswordConfirmation"
            v-model="registerForm.password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">会員登録</button>
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        registerForm: {
          name: '',
          email: '',
          password: 'abcdefghjk',
          password_confirmation: 'abcdefghjk',
        }
      }
    },
    computed: {
      apiStatus() {
        return this.$store.state.auth.apiStatus;
      },
      registerErrors() {
        return this.$store.state.auth.registerErrorMessages;
      },
    },
    methods: {
      async register() {
        await this.$store.dispatch('auth/register', this.registerForm);

        if (this.apiStatus) {
          this.$router.push('/');
        }
      },
    },
  }

</script>
