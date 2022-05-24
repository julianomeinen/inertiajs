<template>
  <Head>
    <title>App</title>
    <meta
      type="description"
      head-key="description"
      content="My new App with Inertiajs"
    />
  </Head>

  <section class="p-6 bg-gray-200 shadow-sm">
    <header class="flex justify-between">
      <div class="flex items-center">
        <h1 class="font-bold text-lg">App Name</h1>
        <p class="text-sm ml-4">Welcome back, {{ username }}</p>
      </div>
      <Nav />
    </header>
  </section>
  <section class="p-6 flex justify-between">
    <div
      class="flex items-center bg-slate-200 m-auto p-6 rounded-2xl shadow-lg"
    >
      <h2 class="text-2xl text-red-500 font-bold p-6">Podcast of the week</h2>
      <div class="p-6 rounded-2xl bg-black">
        <iframe
          src="https://embed.ted.com/talks/lang/en/al_gore_we_have_to_stop_destroying_our_future"
          frameborder="0"
          scrolling="no"
          allowfullscreen
        ></iframe>
      </div>
    </div>
  </section>
  <section class="p-6">
    <div class="max-w-3xl mx-auto">
      <slot />
    </div>
  </section>
</template>

<script>
import Nav from "./Nav.vue";

export default {
  components: { Nav },

  computed: {
    username() {
      return this.$page.props.auth.user.username;
    },
  },
};
</script>
