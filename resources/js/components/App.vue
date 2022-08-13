<template>
  <div>
    <header>
      <Navbar />
    </header>
    <main>
      <div class="container">
        <RouterView />
      </div>
    </main>
    <footer>
      <Footer />
    </footer>
  </div>
</template>

<script>
  import axios from "axios";

  import {
    NOT_FOUND,
    UNAUTHORIZED,
    INTERNAL_SERVER_ERROR,
  } from '../util';

  import Navbar from './Navbar';
  import Footer from './Footer';

  export default {
    components: {
      Navbar,
      Footer,
    },
    computed: {
      errorCode() {
        return this.$store.state.error.code;
      },
    },
    watch: {
      errorCode: {
        async handler(val) {
          if (val === INTERNAL_SERVER_ERROR) {
            this.$router.push('/500');
          } else if (val === UNAUTHORIZED) {
            // セッション有効期限切れの場合、トークンをリフレッシュする
            await axios.get('/api/reflesh-token');

            this.$store.commit('auth/setUser', null);
            this.$router.push('/login');
          } else if (val === NOT_FOUND) {
            this.$router.push('/not-found');
          }
        },
        immediate: true,
      },
    },
  }

</script>
