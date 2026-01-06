--- a/resources/views/profile/partials/update-profile-information-form.blade.php
+++ b/resources/views/profile/partials/update-profile-information-form.blade.php
@@ -27,6 +27,42 @@
             @endif
         </div>
 
+        <!-- Phone -->
+        <div class="mt-4">
+            <x-input-label for="phone" :value="__('Phone')" />
+            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" autocomplete="phone" />
+            <x-input-error class="mt-2" :messages="->get('phone')" />
+        </div>
+
+        <!-- Address -->
+        <div class="mt-4">
+            <x-input-label for="address" :value="__('Address')" />
+            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', ->address)" autocomplete="address" />
+            <x-input-error class="mt-2" :messages="->get('address')" />
+        </div>
+
+        <!-- City -->
+        <div class="mt-4">
+            <x-input-label for="city" :value="__('City')" />
+            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', ->city)" autocomplete="city" />
+            <x-input-error class="mt-2" :messages="->get('city')" />
+        </div>
+
+        <!-- Postal Code -->
+        <div class="mt-4">
+            <x-input-label for="postal_code" :value="__('Postal Code')" />
+            <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" :value="old('postal_code', ->postal_code)" autocomplete="postal-code" />
+            <x-input-error class="mt-2" :messages="->get('postal_code')" />
+        </div>
+
         <div class="flex items-center gap-4 mt-4">
             <x-primary-button>{{ __('Save') }}</x-primary-button>
 

--- a/resources/views/profile/partials/update-profile-information-form.blade.php
+++ b/resources/views/profile/partials/update-profile-information-form.blade.php
@@ -27,6 +27,42 @@
             @endif
         </div>
 
+        <!-- Phone -->
+        <div class="mt-4">
+            <x-input-label for="phone" :value="__('Phone')" />
+            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" autocomplete="phone" />
+            <x-input-error class="mt-2" :messages="->get('phone')" />
+        </div>
+
+        <!-- Address -->
+        <div class="mt-4">
+            <x-input-label for="address" :value="__('Address')" />
+            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', ->address)" autocomplete="address" />
+            <x-input-error class="mt-2" :messages="->get('address')" />
+        </div>
+
+        <!-- City -->
+        <div class="mt-4">
+            <x-input-label for="city" :value="__('City')" />
+            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', ->city)" autocomplete="city" />
+            <x-input-error class="mt-2" :messages="->get('city')" />
+        </div>
+
+        <!-- Postal Code -->
+        <div class="mt-4">
+            <x-input-label for="postal_code" :value="__('Postal Code')" />
+            <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" :value="old('postal_code', ->postal_code)" autocomplete="postal-code" />
+            <x-input-error class="mt-2" :messages="->get('postal_code')" />
+        </div>
+
         <div class="flex items-center gap-4 mt-4">
             <x-primary-button>{{ __('Save') }}</x-primary-button>
 

