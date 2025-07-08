<?php
	
	namespace Quellabs\Contracts\DependencyInjection;
	
	use Quellabs\Contracts\Discovery\ProviderInterface;
	
	/**
	 * Interface for service providers that support centralized autowiring
	 */
	interface ServiceProvider extends ProviderInterface {
		
		/**
		 * Determine if this provider supports creating the given class
		 * @param string $className
		 * @param array $metadata
		 * @return bool
		 */
		public function supports(string $className, array $metadata): bool;
		
		/**
		 * Create an instance of the class with pre-resolved dependencies
		 * @param string $className The class to instantiate
		 * @param array $dependencies Pre-resolved constructor dependencies
		 * @return object
		 */
		public function createInstance(string $className, array $dependencies): object;
		
		/**
		 * Provider priority - higher numbers = higher priority
		 */
		public function getPriority(): int;
	}