<template>
  <div>
    <div>
      植物登録
    </div>
    <div>
      <form @submit.prevent="store">
        <div v-if="storeErrors">
          <ul v-if="storeErrors.name">
            <li v-for="msg in storeErrors.name" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="storeErrors.body">
            <li v-for="msg in storeErrors.body" :key="msg">{{ msg }}</li>
          </ul>
        </div>
        <div class="mb-3">
          <label for="InputName" class="form-label">植物名</label>
          <input type="text" class="form-control" id="InputName" v-model="plantForm.name">
        </div>
        <div class="mb-3">
          <label for="bodyFormControlTextarea" class="form-label">特徴</label>
          <textarea class="form-control" id="bodyFormControlTextarea" rows="3" v-model="plantForm.body"></textarea>
        </div>
        <button type="text" class="btn btn-primary">登録</button>
      </form>
    </div>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        plantForm: {
          name: '',
          body: '',
        },
      }
    },
    created() {
      this.clearError();
    },
    computed: {
      apiStatus() {
        return this.$store.state.plant.apiStatus;
      },
      storeErrors() {
        return this.$store.state.plant.storeErrorMessages;
      },
    },
    methods: {
      async store() {
        await this.$store.dispatch('plant/store', this.plantForm);

        if (this.apiStatus) {
          this.$router.push('/');
        }
      },
      clearError() {
        this.$store.commit('plant/setStoreErrorMessages', null);
      },
    }
  }

</script>
