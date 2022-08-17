<template>
  <div class="mb-2">
    <div>
      <!-- Plant -->
    </div>
    <div class="card">
      <div class="card-body">
        <p class="card-text">{{ item.data.name }}</p>
        <p class="card-text">{{ item.data.body }}</p>
      </div>
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
