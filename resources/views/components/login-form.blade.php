<div>
     <h1 class="text-2xl font-bold mb-6 text-center">Přihlášení</h1>

                    <form action="/login" method="POST">
                        @csrf
                        <label for="email" class="font-bold">Email</label>
                        <x-input 
                            type="email" 
                            placeholder="jmeno@email.com" 
                            name="email" 
                            value="{{ old('email') }}" 
                            class="mb-4 w-full focus:border-neutral-800 focus:outline-none" 
                        />

                        <label for="password" class="font-bold">Heslo</label>    
                        <x-input 
                            type="password" 
                            placeholder="*****" 
                            name="password" 
                            value="{{ old('password') }}" 
                            class="mb-8 w-full focus:border-neutral-800 focus:outline-none"
                        />

                        <x-button type="submit" class="mb-4 w-full">Přihlásit se</x-button>
                    </form>

                    <p class="text-sm text-center">
                        Nemáš účet? 
                        <a href="/register" class="text-orange-500 hover:text-orange-600 font-bold">Zaregistruj se.</a>
                    </p>
</div>