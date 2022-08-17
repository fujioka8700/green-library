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
    <div>
      <Pagination
        :current-page="currentPage"
        :last-page="lastPage"
      />
    </div>
  </div>
</template>

<script>
  import axios from "axios";
  import Plant from './Plant';
  import Pagination from '../Pagination';
  import {
    OK
  } from '../../util';

  export default {
    components: {
      Plant,
      Pagination,
    },
    props: {
      page: {
        type: Number,
        required: false,
        default: 1,
      }
    },
    data() {
      return {
        plants: [],
        currentPage: 0,
        lastPage: 0,
      }
    },
    methods: {
      async fetchPlants() {
        const response = await axios.get(`/api/plants?page=${this.page}`);

        if (response.status !== OK) {
          this.$store.commit('error/setCode', response.status);
          return false;
        }

        this.plants = response.data.data;
        this.currentPage = response.data.meta.current_page;
        this.lastPage = response.data.meta.last_page;
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
