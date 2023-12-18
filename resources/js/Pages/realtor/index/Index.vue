<template>
  <h1 class="text-3xl mb-4">Your Listings</h1>
  <section class="mb-8">
    <Filters />
  </section>
  <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
    <Box v-for="listing in listings.data" :key="listing.id">
      <div
        class="flex flex-col md:flex-row gap-2 md:items-center justify-between"
      >
        <div>
          <div class="xl:flex items-center gap-2">
            <ListingPrice :price="listing.price" class="text-2xl font-medium" />
            <ListingSpace :listing="listing" />
          </div>
          <ListingAddress :listing="listing" />
        </div>
        <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
          <Link class="btn-outline text-xs font-medium" :href="`/listings/${listing.id}`">Preview</Link>
          <Link class="btn-outline text-xs font-medium" :href="`/listings/${listing.id}/edit`">Edit</Link>
          <Link
            :href="`/realtor/listings/${listing.id}`"
            method="DELETE"
            as="button"
            class="btn-outline text-xs font-medium"
            >Delete</Link
          >
        </div>
      </div>
    </Box>
  </section>
  <div class="flex justify-center w-full my-8" v-if="listings.data.length">
    <Pagination :links="listings.links" />
  </div>
</template>

<script setup>
import ListingAddress from "../../../components/ListingAddress.vue";
import ListingPrice from "../../../components/ListingPrice.vue";
import ListingSpace from "../../../components/ListingSpace.vue";
import Pagination from "../../../components/UI/Pagination.vue";
import Box from "../../../components/UI/Box.vue";
import Filters from "./Filters.vue";
import { Link } from "@inertiajs/vue3";
defineProps({
  listings: Object,
});
</script>