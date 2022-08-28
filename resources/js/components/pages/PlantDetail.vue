<template>
  <div>
    <div>
      Plant Detail
    </div>
    <div>
      <div class="row">
        <div class="col">
          <div class="text-center">
            <img src="https://placehold.jp/200x200.png" class="img-fluid" alt="...">
          </div>
        </div>
        <div class="col" v-if="plant">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">植物名</th>
                <td>{{ plant.name }}</td>
              </tr>
              <tr>
                <th scope="row">学名</th>
                <td></td>
              </tr>
              <tr>
                <th scope="row">科名</th>
                <td></td>
              </tr>
              <tr>
                <th scope="row">属名</th>
                <td></td>
              </tr>
              <tr>
                <th scope="row">原産地</th>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <h2>{{ plant.name }}の特徴</h2>
      <p>
        {{ plant.body }}
      </p>
    </div>
  </div>
</template>

<script>
  import axios from "axios";
  import {
    OK,
  } from '../../util';

  export default {
    props: {
      id: {
        type: String,
        required: true,
      },
    },
    data() {
      return {
        plant: null,
      }
    },
    methods: {
      async fetchPlant() {
        const response = await axios.get(`/api/plants/${this.id}`);

        if (response.status !== OK) {
          this.$store.commit('error/setCode', response.status);
          return false;
        }

        if (response.data.data !== null) {
          this.plant = response.data.data;
        }
      },
    },
    watch: {
      $route: {
        async handler() {
          await this.fetchPlant();
        },
        immediate: true,
      },
    },
  }

</script>
