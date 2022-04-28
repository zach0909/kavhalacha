<template>
    <div class="container">
        <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-tab"
            role="tablist">
            <li v-for="option in options" class="nav-item" role="presentation" @click="$emit('optionClick', option)">
                <div class="nav-link block font-medium text-xs leading-tight uppercase border-x-0 border-t-0 border-b-2 border-transparent
                  px-6 py-3 my-2 hover:border-transparent hover:bg-gray-100 focus:border-transparent cursor-pointer"
                     :class="{active: option.id === selectedOption.id}"
                >{{option.name}}</div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        options: {
            type: Array,
            default: () => []
        },
        selectedOption: {
            type: Object,
            default: () => {}
        }
    }
}
</script>

<style>
.active {
    color: #2563eb;
    border-color: #2563eb;
}
</style>
