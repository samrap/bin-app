<template>
    <div class="claim-item">
        <div class="font-bold transition-all-500" v-bind:class="{ 'text-xl': claimClicked, 'text-5xl' : !claimClicked }">
            ${{ price }}
        </div>
        <p v-if="claimClicked" class="mt-4 leading-tight text-xs text-gray-700">Enter your email below and click <strong class="uppercase">Confirm</strong> to claim this item. I'll reach out to you for shipping and payment info.</p>
        <form v-bind:action="action" method="POST" class="mt-2">
            <slot></slot>
            <transition name="fade">
                <input v-if="claimClicked" class="block w-full py-6 px-4 bg-white text-black border border-black" name="identity" type="email" placeholder="Email address" autofocus required />
            </transition>
            <button type="button" v-if="!claimClicked" v-on:click="updateClaimClicked" class="block mt-2 w-full py-6 px-8 bg-black text-white font-bold uppercase text-center">Claim</button>
            <button v-if="claimClicked" type="submit" class="block w-full py-6 px-8 bg-black text-white font-bold uppercase text-center">Confirm</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['action', 'price'],
        data() {
            return {
                action: '',
                price: 0,
                claimClicked: false,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            updateClaimClicked: function() {
                this.claimClicked = true
            }
        }
    }
</script>
