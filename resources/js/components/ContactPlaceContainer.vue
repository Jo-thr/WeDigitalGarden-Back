<template>
  <section id="place-container" class="flex">
    <img v-for="image in images" :key="images.url" :src="image.url" v-show="image.show">
    <div class="flex flex-wrap ml-10 mt-3 inline">
      <contact-place-item
        v-for="(place, index) in places"
        :key="index"
        :place="place"
        :class="{active: (index === 0 && only)}"
        v-on:setImage="onItemHover"
        v-on:default="onItemLeave"
      ></contact-place-item>
    </div>
  </section>
</template>

<script>
  export default {
    name: 'ContactPlaceContainer',
    data() {
      return {
        only: true,
        // Dynamic data
        images: [
          {
            country: 'FRANCE',
            url: '/images/grenelle.jpg',
            show: true,
          },
          {
            country: 'BELGIUM',
            url: '/images/Visual.jpg',
            show: false,
          },
          {
            country: 'NETHERLANDS',
            url: '/images/Visual2.jpg',
            show: false,
          },
          {
            country: 'SWITZERLAND',
            url: '/images/Visual4.jpg',
            show: false,
          },
          {
            country: 'USA',
            url: '/images/Visual5.jpg',
            show: false,
          },
        ],
        places: [
          {
            country: 'FRANCE',
            address: '103 rue de grenelle',
            city: '75007 Paris',
          },
          {
            country: 'BELGIUM',
            address: '103 rue de grenelle',
            city: '75007 Paris',
          },
          {
            country: 'NETHERLANDS',
            address: '103 rue de grenelle',
            city: '75007 Paris',
          },
          {
            country: 'SWITZERLAND',
            address: '103 rue de grenelle',
            city: '75007 Paris',
          },
          {
            country: 'USA',
            address: '103 rue de grenelle',
            city: '75007 Paris',
          },
        ],
      };
    },
    methods: {
      onItemHover(value) {
        this.images.map((image, index) => {
          image.show = image.country === value;
        });
        this.only = value === 'FRANCE';
      },
      onItemLeave() {
        this.images.map((image, index) => {
          image.show = image.country === 'FRANCE';
        });
        this.only = true;
      },
    },
  };
</script>

<style lang="scss" scoped>
    #place-container {
        width: 968px;
        margin: auto;
    }
</style>
