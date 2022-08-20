<template>
  <div>
    <div>
      <!-- Plant -->
    </div>
    <div class="card mb-2">
      <RouterLink :to="`/plants/${item.data.id}`" class="text-body text-decoration-none">
        <div class="card-body">
          <p class="card-text">{{ item.data.name }}</p>
          <p class="card-text">{{ item.data.body }}</p>
        </div>
      </RouterLink>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      item: {
        type: Object,
        required: true,
      },
    },
  }

</script>
