<template>
    <div class="container">
        <div class="flex justify-center">
            <nav aria-label="Page navigation example">
                <ul class="flex list-style-none">
                    <li v-if="hasPrevPage" class="page-item mr-1"><span
                        class="page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none cursor-pointer"
                        @click="handlePrevClick">Previous</span></li>
                    <li v-if="hasNextPage" class="page-item"><span
                        class="page-link relative block py-1.5 px-3 rounded border-0 bg-transparent outline-none transition-all duration-300 rounded text-gray-800 hover:text-gray-800 hover:bg-gray-200 focus:shadow-none cursor-pointer"
                        @click="handleNextClick">Next</span></li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        hasPrevPage: {
            type: Boolean,
            default: false
        },
        hasNextPage: {
            type: Boolean,
            default: false
        },
        currentPage: {
            type: Number,
            default: 1
        }
    },
    methods: {
        handlePrevClick () {
            this.$emit('prevClicked')
        },
        handleNextClick () {
            this.$emit('nextClicked')
        }
    },
    watch: {
        links () {
            console.log('links', this.links)
            console.log('linkslength', this.links.length)
        }
    }
}
</script>

<style>
.page-item {
    border: 1px solid lightgrey;
    border-radius: 4px;
}
</style>
