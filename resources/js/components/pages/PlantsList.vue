<template>
  <div>
    <div>
      <!-- PlantsList -->
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
        :pagination-numbers="paginationNumbers"
      />
    </div>
  </div>
</template>

<script>
  import axios from "axios";
  import Plant from './Plant';
  import Pagination from '../Pagination';
  import {
    OK,
    pagination,
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
      },
    },
    data() {
      return {
        plants: [],
        paginationNumbers: [],
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

        // 植物のデータ
        this.plants = response.data.data;

        // ページネーション
        this.currentPage = response.data.meta.current_page;
        this.lastPage = response.data.meta.last_page;
        this.paginationNumbers = pagination(this.currentPage, this.lastPage);
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
