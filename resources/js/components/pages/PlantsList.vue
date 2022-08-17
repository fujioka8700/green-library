<template>
  <div>
    <div>
      PlantsList
    </div>
    <div>
      <Plant
        v-for="plant in plants"
        :key="plant.id"
        :item='plant'
      />
    </div>
  </div>
</template>

<script>
  import axios from "axios";
  import Plant from './Plant';
  import {
    OK
  } from '../../util';

  export default {
    components: {
      Plant,
    },
    data() {
      return {
        plants: [],
      }
    },
    methods: {
      async fetchPlants() {
        const response = await axios.get('/api/plants?page=1');

        if (response.status !== OK) {
          this.$store.commit('error/setCode', response.status);
          return false;
        }

        this.plants = response.data.data;
      },
    },
    watch: {
      $route: {
        async handler() {
          await this.fetchPlants();
        },
        immediate: true,
      },
    },
  }

</script>
