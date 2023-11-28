<template>
  <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
    <Box class="md:col-span-7 flex items-center w-full">
      <div class="w-full text-center font-medium text-gray-500">No images</div>
    </Box>
    <div class="md:col-span-5 flex flex-col gap-4">
      <Box>
        <template #header> Basic info </template>
        <ListingPrice :price="listing.price" class="text-2xl font-bold" />
        <ListingSpace :listing="listing" class="text-lg" />
      </Box>

      <Box>
        <template #header> Offer </template>
        Make an offer
      </Box>
    </div>
  </div>
</template>
  
  <script setup>
import ListingSpace from "../../components/ListingSpace.vue";
import ListingPrice from "../../components/ListingPrice.vue";

defineProps({
  listing: Object
})
</script>
  