<template>
  <div>
    <div>
      Pagination
    </div>
    <div>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <RouterLink
              v-if="! isFirstPage"
              :to="`/?page=${currentPage - 1}`"
              class="page-link"
            >
              Previous
            </RouterLink>
          </li>
          <li v-for="number in paginationNumbers" :key="number" class="page-item">
            <RouterLink
              :to="`/?page=${number}`"
              class="page-link"
              :class="{ active: number === currentPage }"
            >{{ number }}
            </RouterLink>
          </li>
          <li class="page-item">
            <RouterLink
              v-if="! isLastPage"
              :to="`/?page=${currentPage + 1}`"
              class="page-link"
            >
              Next
            </RouterLink>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      paginationNumbers: {
        type: Array,
        required: true,
      },
      currentPage: {
        type: Number,
        required: true,
      },
      lastPage: {
        type: Number,
        required: true,
      },
    },
    computed: {
      isFirstPage() {
        return this.currentPage === 1;
      },
      isLastPage() {
        return this.currentPage === this.lastPage;
      },
    },
  }

</script>
