<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">
            I'm an example component. {{ title }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'Welcome',
    props: ['title'],
    data() {
      return {
        currentYear: 2020,
      };
    },
    mounted() {
      console.log('Footer présent');
    },
  };
</script>

<style scoped>
.max-h-9 {
  max-height: 2.2rem;
}
</style>
