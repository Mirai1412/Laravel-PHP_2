<template>
<div class="flex items-center justify-center w-screen h-screen bg-white dark:bg-gray-800">
<div class="bg-white dark:bg-gray-800 text-black dark:text-gray-200 p-4 antialiased flex max-w-lg">
  <img class="rounded-full h-8 w-8 mr-2 mt-1 " src="https://picsum.photos/id/1027/200/200"/>
  <div>
    <div class="bg-gray-100 dark:bg-gray-700 rounded-3xl px-4 pt-2 pb-2.5">
      <div class="font-semibold text-sm leading-relaxed">Jon Doe</div>
      <div class="text-normal leading-snug md:leading-normal"
      >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    </div>
    <div class="text-sm ml-4 mt-0.5 text-gray-500 dark:text-gray-400">14 w</div>

  </div>
</div>
</div>
</template>
<script>

export default{
    props:['comment'],
}
</script>
