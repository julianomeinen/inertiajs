<template>
  <nav>
    <ul class="flex list-flex space-x-4">
      <li>
        <NavLink href="/" :active="$page.component == 'Home'">Home</NavLink>
      </li>
      <li>
        <NavLink href="/users" :active="$page.component == 'Users/Index'">Users</NavLink>
      </li>
      <li>
        <NavLink href="/settings?asdas=asdas&asdc=adas" :active="$page.component == 'Settings'" >Settings</NavLink>
      </li>
      <li>
        <NavLink
          href="/logout"
          method="post" >
          Logout
        </NavLink>
      </li>
    </ul>
  </nav>
</template>

<script>
import NavLink from "./NavLink.vue";

export default {
  components: { NavLink },
};
</script>
