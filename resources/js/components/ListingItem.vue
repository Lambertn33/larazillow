<template>
  <div>
    <Link :href="`/listings/${listing.id}`">
      <div class="flex items-center gap-2">
        <ListingPrice :price="listing.price" class="text-2xl font-bold" />
        <div><ListingPrice :price="monthlyPayment" class="text-xs" /> pm</div>
      </div>
      <ListingSpace :listing="listing" class="text-lg" />
    </Link>
    <div class="w-full justify-between flex">
      <Link :href="`/listings/${listing.id}/edit`" class="text-yellow-600 font-bold">Edit</Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import ListingSpace from "./ListingSpace.vue";
import ListingPrice from "./ListingPrice.vue";
import { useMonthlyPayment } from "../composables/useMonthlyPayment";

const props = defineProps({
  listing: Object,
});

const { monthlyPayment } = useMonthlyPayment(props.listing.price, 2.5, 25);
</script>