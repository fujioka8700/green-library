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
  import Navbar from './Navbar';
  import Footer from './Footer';

  export default {
    components: {
      Navbar,
      Footer
    }
  }

</script>
