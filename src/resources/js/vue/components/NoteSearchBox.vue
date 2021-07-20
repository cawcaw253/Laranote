<template>
  <div class="relative mx-auto text-gray-600">
    hello world
    <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Search">
    <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
      <ion-icon name="search-outline"></ion-icon>
    </button>
  </div>
</template>

<script>

export default {
  props: {
    test: {
      type: String,
    }
  },
  data() {
    return {
      data: "hello world",
    };
  },
  mounted() {
    console.log(this.test);
    console.log(this.data);
  },
};
</script>
