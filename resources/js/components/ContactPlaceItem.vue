<template>
  <a href="" @mouseenter="onHover" @mouseleave="onMouseLeave">
    <div class="font-futura place-item pr-8" :class="{active: hover}">
      <h3 class="font-normal font-size-20 mb-2">{{place.country}}</h3>
      <p class="opacity-50 font-size-16">{{place.address}}</p>
      <p class="opacity-50 mb-2 font-size-16">{{place.city}}</p>
      <p class="link opacity-50 px-2 font-normal">VIEW MAP</p>
    </div>
  </a>
</template>

<script>
  export default {
    name: 'ContactPlaceItem',
    props: {
      place: {
        country: String,
        address: String,
        city: String,
      },
    },
    data() {
      return {
        hover: false,
      };
    },
    mounted() {
    },
    methods: {
      onHover() {
        this.hover = true;
        this.$emit('setImage', this.place.country);
      },
      onMouseLeave() {
        this.$emit('default');
        this.hover = false;
      },
    },
  };
</script>

<style lang="scss" scoped>
    @import '../../sass/variables';

    .place-item {

        h3::after {
            content: "";
            display: block;
            height: 3px;
            width: 25%;
            margin-top: 4px;
            background-color: $primaryGreen;
            transition: all 0.5s;
        }

        h3, p {
            letter-spacing: 2px;
        }

        .link {
            display: inline-block;
            font-weight: 500;
            background-color: $primaryYellow;
            color: $primaryGreen;
        }
    }

    .active {
        h3 {
            font-weight: 500;

            &:after{
                width: 100%;
            }
        }

        p {
            opacity: 1;
        }
    }
</style>
