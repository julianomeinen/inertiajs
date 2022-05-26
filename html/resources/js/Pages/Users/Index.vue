<template>
  <Head>
    <title>Users</title>
    <meta
      type="description"
      head-key="description"
      content="Users from My new App with Inertiajs"
    />
  </Head>

  <div class="flex justify-between mb-6">
        <div class="flex items-center">
            <h1 class="text-3xl">Users</h1>
            <Link href="/users/create" class="text-blue-500 hover:underline ml-5" >
                New user
            </Link>
        </div>
        <input v-model="search" type="text" placeholder="Search..." class="rounded-lg px-2 border" />
  </div>

  <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="bg-white border-b">
              <tr>
                <th
                  scope="col"
                  class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                >
                  #
                </th>
                <th
                  scope="col"
                  class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                >
                  Username
                </th>
                <th
                  scope="col"
                  class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                >
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(user, index) in users.data"
                key="user.id"
                class="border-b"
                :class="{ 'bg-gray-100': index % 2 == 0 }"
              >
                <td
                  class="
                    px-6
                    py-4
                    whitespace-nowrap
                    text-sm
                    font-medium
                    text-gray-900
                  "
                >
                  {{ index + 1 }}
                </td>
                <td
                  class="
                    text-sm text-gray-900
                    font-light
                    px-6
                    py-4
                    whitespace-nowrap
                  "
                >
                  {{ user.name }}
                </td>
                <td
                  class="
                    text-sm text-gray-900
                    font-light
                    px-6
                    py-4
                    whitespace-nowrap
                  "
                >
                  <Link
                    :href="`users/${user.id}/edit`"
                    class="
                      font-semibold
                      text-indigo-600
                      hover:text-indigo-900 hover:underline
                    "
                    >Edit</Link
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <Pagination :links="users.links" />

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
    <Link href="/users" class="text-blue-500 hover:underline" preserve-scroll
      >Refresh</Link
    >
  </div>
</template>
<script setup>
import {ref, watch} from 'vue'
import Pagination from "../../Shared/Pagination.vue";
import {Inertia} from '@inertiajs/inertia'

let props = defineProps({
  time: String,
  users: Object,
  filters: Object
});

let search = ref(props.filters.search);

watch(search, value => {
    Inertia.get('/users', {search: value}, {
        preserveState: true,
        replace: true
    });
});

</script>
