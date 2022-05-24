<template>
  <Layout>
    <h1 class="text-3xl">Users</h1>
    <div
      class="
        mt-80
        py-8
        px-8
        max-w-sm
        bg-white
        rounded-xl
        shadow-lg
        space-y-2
        sm:py-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-6
      "
    >
      <p>The current time is {{ time }}.</p>
      <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
    </div>
  </Layout>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import Layout from '../Shared/Layout';

export default {
  components: { Layout, Link },
  props: {
    time: String,
  },
};
</script>
