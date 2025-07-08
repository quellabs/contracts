<?php
	
	namespace Quellabs\Contracts\DependencyInjection;
	
	/**
	 * Abstract base class for service providers with centralized autowiring
	 *
	 * This class serves as the foundation for all service providers in the application.
	 * It implements the ServiceProviderInterface and provides common functionality
	 * that all service providers will inherit.
	 */
	abstract class AbstractProvider extends \Quellabs\Contracts\Discovery\AbstractProvider implements ServiceProvider {
		
		/**
		 * Implements the required method from ProviderInterface
		 */
		public static function getMetadata(): array {
			return [];
		}
		
		/**
		 * Creates a new instance of the specified class with the provided dependencies
		 * @template T
		 * @param class-string<T> $className The fully qualified class name to instantiate
		 * @param array $dependencies An array of resolved dependencies to pass to the constructor
		 * @return T The newly created instance of the specified class
		 */
		public function createInstance(string $className, array $dependencies): object {
			// Use the splat operator (...) to unpack the dependency array
			// This allows passing each dependency as a separate argument to the constructor
			// instead of passing the entire array as a single argument
			return new $className(... $dependencies);
		}
		
		/**
		 * Default priority for user providers
		 * @return int User providers get higher priority by default
		 */
		public function getPriority(): int {
			return 0;
		}
		
		/**
		 * Returns true if the Dependency Injection provider supports the given class
		 * @param string $className
		 * @param array $metadata
		 * @return bool
		 */
		abstract public function supports(string $className, array $metadata): bool;
	}