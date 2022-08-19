<template>
  <div>
    <div>
      <!-- Pagination -->
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
              &lt;&lt;
            </RouterLink>
            <span v-else class="page-link disabled">
              &lt;&lt;
            </span>
          </li>
          <li v-for="(number, index) in paginationNumbers" :key="index" class="page-item">
            <RouterLink
              v-if="number >= 1"
              :to="`/?page=${number}`"
              class="page-link"
              :class="{ active: number === currentPage }"
            >{{ number }}
            </RouterLink>
            <span v-else class="page-link disabled">
              {{ number }}
            </span>
          </li>
          <li class="page-item">
            <RouterLink
              v-if="! isLastPage"
              :to="`/?page=${currentPage + 1}`"
              class="page-link"
            >
              &gt;&gt;
            </RouterLink>
            <span v-else class="page-link disabled">
              &gt;&gt;
            </span>
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
