<?php
// source: /var/www/html/app/../config/env/prod.neon
// source: /var/www/html/app/../config/local.neon
// source: array
// source: array

/** @noinspection PhpParamsInspection,PhpMethodMayBeStaticInspection */

declare(strict_types=1);

class Container_e8ce9dd9d4 extends Nette\DI\Container
{
	protected $tags = [
		'middleware' => [
			'api.middlewares.api' => ['priority' => 500],
			'api.middlewares.autobasepath' => ['priority' => 200],
			'middleware.authenticator' => ['priority' => 250],
			'middleware.cors' => ['priority' => 200],
			'middleware.methodOverride' => ['priority' => 150],
			'middleware.tryCatch' => ['priority' => 1],
			'middlewares.logging' => ['priority' => 100],
		],
		'console.command' => [
			'nettrine.dbal.console.reservedWordsCommand' => 'dbal:reserved-words',
			'nettrine.dbal.console.runSqlCommand' => 'dbal:run-sql',
			'nettrine.fixtures.loadDataFixturesCommand' => 'doctrine:fixtures:load',
			'nettrine.migrations.currentCommand' => 'migrations:current',
			'nettrine.migrations.diffCommand' => 'migrations:diff',
			'nettrine.migrations.dumpSchemaCommand' => 'migrations:dump-schema',
			'nettrine.migrations.executeCommand' => 'migrations:execute',
			'nettrine.migrations.generateCommand' => 'migrations:generate',
			'nettrine.migrations.latestCommand' => 'migrations:latest',
			'nettrine.migrations.listCommand' => 'migrations:list',
			'nettrine.migrations.migrateCommand' => 'migrations:migrate',
			'nettrine.migrations.rollupCommand' => 'migrations:rollup',
			'nettrine.migrations.statusCommand' => 'migrations:status',
			'nettrine.migrations.syncMetadataCommand' => 'migrations:sync-metadata-storage',
			'nettrine.migrations.upToDateCommand' => 'migrations:up-to-date',
			'nettrine.migrations.versionCommand' => 'migrations:version',
			'nettrine.orm.console.clearMetadataCacheCommand' => 'orm:clear-cache:metadata',
			'nettrine.orm.console.convertMappingCommand' => 'orm:convert-mapping',
			'nettrine.orm.console.ensureProductionSettingsCommand' => 'orm:ensure-production-settings',
			'nettrine.orm.console.generateEntitiesCommand' => 'orm:generate-entities',
			'nettrine.orm.console.generateProxiesCommand' => 'orm:generate-proxies',
			'nettrine.orm.console.generateRepositoriesCommand' => 'orm:generate-repositories',
			'nettrine.orm.console.infoCommand' => 'orm:info',
			'nettrine.orm.console.mappingDescribeCommand' => 'orm:mapping:describe',
			'nettrine.orm.console.runDqlCommand' => 'orm:run-dql',
			'nettrine.orm.console.schemaToolCreateCommand' => 'orm:schema-tool:create',
			'nettrine.orm.console.schemaToolDropCommand' => 'orm:schema-tool:drop',
			'nettrine.orm.console.schemaToolUpdateCommand' => 'orm:schema-tool:update',
			'nettrine.orm.console.validateSchemaCommand' => 'orm:validate-schema',
		],
		'nette.inject' => ['nettrine.fixtures.loadDataFixturesCommand' => true],
		'nettrine.orm.annotation.driver' => ['nettrine.orm.annotations.annotationDriver' => true],
		'nettrine.orm.mapping.driver' => ['nettrine.orm.mappingDriver' => true],
	];

	protected $types = ['container' => 'Nette\DI\Container'];

	protected $aliases = [
		'httpRequest' => 'http.request',
		'httpResponse' => 'http.response',
		'nette.httpRequestFactory' => 'http.requestFactory',
		'session' => 'session.session',
	];

	protected $wiring = [
		'Nette\DI\Container' => [['container']],
		'Nette\Http\RequestFactory' => [['http.requestFactory']],
		'Nette\Http\IRequest' => [['http.request']],
		'Nette\Http\Request' => [['http.request']],
		'Nette\Http\IResponse' => [['http.response']],
		'Nette\Http\Response' => [['http.response']],
		'Nette\Http\Session' => [['session.session']],
		'Tracy\ILogger' => [0 => ['monolog.psrToTracyLazyAdapter'], 2 => ['tracy.logger', 'monolog.psrToTracyAdapter']],
		'Tracy\BlueScreen' => [['tracy.blueScreen']],
		'Tracy\Bar' => [['tracy.bar']],
		'Contributte\Middlewares\Utils\ChainBuilder' => [2 => ['middlewares.chain']],
		'Contributte\Middlewares\Application\AbstractApplication' => [['middlewares.application']],
		'Contributte\Middlewares\Application\IApplication' => [['middlewares.application']],
		'Contributte\Middlewares\Application\MiddlewareApplication' => [['middlewares.application']],
		'Apitte\Core\Dispatcher\JsonDispatcher' => [['api.core.dispatcher']],
		'Apitte\Core\Dispatcher\CoreDispatcher' => [['api.core.dispatcher']],
		'Apitte\Core\Dispatcher\IDispatcher' => [['api.core.dispatcher']],
		'App\Model\Api\Dispatcher\JsonDispatcher' => [['api.core.dispatcher']],
		'Apitte\Core\ErrorHandler\IErrorHandler' => [['api.core.errorHandler']],
		'Apitte\Core\Application\IApplication' => [['api.core.application']],
		'Apitte\Core\Router\IRouter' => [['api.core.router']],
		'Apitte\Core\Handler\IHandler' => [['api.core.handler']],
		'Apitte\Core\Schema\Schema' => [['api.core.schema']],
		'Contributte\Middlewares\IMiddleware' => [
			[
				'api.middlewares.autobasepath',
				'api.middlewares.api',
				'middleware.tryCatch',
				'middlewares.logging',
				'middleware.methodOverride',
				'middleware.cors',
				'middleware.authenticator',
			],
		],
		'Contributte\Middlewares\AutoBasePathMiddleware' => [['api.middlewares.autobasepath']],
		'Apitte\Middlewares\ApiMiddleware' => [['api.middlewares.api']],
		'Apitte\OpenApi\SchemaDefinition\Entity\IEntityAdapter' => [['api.openapi.entityAdapter']],
		'Apitte\OpenApi\SchemaDefinition\Entity\EntityAdapter' => [['api.openapi.entityAdapter']],
		'Apitte\OpenApi\SchemaDefinition\IDefinition' => [['api.openapi.coreDefinition']],
		'Apitte\OpenApi\SchemaDefinition\CoreDefinition' => [['api.openapi.coreDefinition']],
		'Apitte\OpenApi\ISchemaBuilder' => [['api.openapi.schemaBuilder']],
		'Apitte\OpenApi\SchemaBuilder' => [['api.openapi.schemaBuilder']],
		'Symfony\Component\Console\Application' => [['console.application']],
		'Symfony\Contracts\Service\ResetInterface' => [['console.application']],
		'Contributte\Console\Application' => [['console.application']],
		'Symfony\Component\Console\CommandLoader\CommandLoaderInterface' => [['console.commandLoader']],
		'Monolog\Handler\StreamHandler' => [2 => ['monolog.logger.default.handler.0']],
		'Monolog\Handler\AbstractProcessingHandler' => [2 => ['monolog.logger.default.handler.0']],
		'Monolog\Handler\AbstractHandler' => [2 => ['monolog.logger.default.handler.0']],
		'Monolog\Handler\Handler' => [2 => ['monolog.logger.default.handler.0']],
		'Monolog\Handler\HandlerInterface' => [2 => ['monolog.logger.default.handler.0']],
		'Monolog\ResettableInterface' => [0 => ['monolog.logger.default'], 2 => ['monolog.logger.default.handler.0']],
		'Monolog\Handler\ProcessableHandlerInterface' => [2 => ['monolog.logger.default.handler.0']],
		'Monolog\Handler\FormattableHandlerInterface' => [2 => ['monolog.logger.default.handler.0']],
		'Monolog\Handler\RotatingFileHandler' => [2 => ['monolog.logger.default.handler.0']],
		'Monolog\Processor\ProcessorInterface' => [
			2 => [
				'monolog.logger.default.processor.0',
				'monolog.logger.default.processor.1',
				'monolog.logger.default.processor.2',
				'monolog.logger.default.processor.3',
			],
		],
		'Monolog\Processor\WebProcessor' => [2 => ['monolog.logger.default.processor.0']],
		'Monolog\Processor\IntrospectionProcessor' => [2 => ['monolog.logger.default.processor.1']],
		'Monolog\Processor\MemoryProcessor' => [2 => ['monolog.logger.default.processor.2']],
		'Monolog\Processor\MemoryPeakUsageProcessor' => [2 => ['monolog.logger.default.processor.2']],
		'Monolog\Processor\ProcessIdProcessor' => [2 => ['monolog.logger.default.processor.3']],
		'Psr\Log\LoggerInterface' => [['monolog.logger.default']],
		'Monolog\Logger' => [['monolog.logger.default']],
		'Tracy\Bridges\Psr\PsrToTracyLoggerAdapter' => [2 => ['monolog.psrToTracyAdapter']],
		'Contributte\Monolog\Tracy\LazyTracyLogger' => [['monolog.psrToTracyLazyAdapter']],
		'Doctrine\Common\Annotations\Reader' => [
			0 => ['nettrine.annotations.reader'],
			2 => [0 => 'nettrine.annotations.delegatedReader', 2 => 'symfony.serializer.annotationReader'],
		],
		'Doctrine\Common\Annotations\AnnotationReader' => [
			2 => ['nettrine.annotations.delegatedReader', 'symfony.serializer.annotationReader'],
		],
		'Doctrine\DBAL\Logging\SQLLogger' => [
			['nettrine.dbal.profiler'],
			['nettrine.dbal.logger'],
			['nettrine.dbal.logger.config'],
		],
		'Nettrine\DBAL\Logger\PsrLogger' => [2 => ['nettrine.dbal.logger.config']],
		'Nettrine\DBAL\Logger\AbstractLogger' => [['nettrine.dbal.profiler']],
		'Nettrine\DBAL\Logger\ProfilerLogger' => [['nettrine.dbal.profiler']],
		'Doctrine\DBAL\Logging\LoggerChain' => [['nettrine.dbal.logger']],
		'Doctrine\DBAL\Configuration' => [0 => ['nettrine.orm.configuration'], 2 => ['nettrine.dbal.configuration']],
		'Doctrine\Common\EventManager' => [0 => ['nettrine.dbal.eventManager.debug'], 2 => ['nettrine.dbal.eventManager']],
		'Nettrine\DBAL\Events\ContainerAwareEventManager' => [2 => ['nettrine.dbal.eventManager']],
		'Nettrine\DBAL\Events\DebugEventManager' => [['nettrine.dbal.eventManager.debug']],
		'Nettrine\DBAL\ConnectionFactory' => [['nettrine.dbal.connectionFactory']],
		'Doctrine\DBAL\Connection' => [['nettrine.dbal.connection']],
		'Nettrine\DBAL\ConnectionAccessor' => [['nettrine.dbal.connectionAccessor']],
		'Doctrine\DBAL\Tools\Console\ConnectionProvider' => [2 => ['nettrine.dbal.console.connectionProvider']],
		'Doctrine\DBAL\Tools\Console\ConnectionProvider\SingleConnectionProvider' => [
			2 => ['nettrine.dbal.console.connectionProvider'],
		],
		'Symfony\Component\Console\Command\Command' => [
			0 => ['nettrine.fixtures.loadDataFixturesCommand'],
			2 => [
				'nettrine.dbal.console.reservedWordsCommand',
				'nettrine.dbal.console.runSqlCommand',
				'nettrine.orm.console.schemaToolCreateCommand',
				'nettrine.orm.console.schemaToolUpdateCommand',
				'nettrine.orm.console.schemaToolDropCommand',
				'nettrine.orm.console.convertMappingCommand',
				'nettrine.orm.console.ensureProductionSettingsCommand',
				'nettrine.orm.console.generateEntitiesCommand',
				'nettrine.orm.console.generateProxiesCommand',
				'nettrine.orm.console.generateRepositoriesCommand',
				'nettrine.orm.console.infoCommand',
				'nettrine.orm.console.mappingDescribeCommand',
				'nettrine.orm.console.runDqlCommand',
				'nettrine.orm.console.validateSchemaCommand',
				'nettrine.orm.console.clearMetadataCacheCommand',
				'nettrine.migrations.currentCommand',
				'nettrine.migrations.diffCommand',
				'nettrine.migrations.dumpSchemaCommand',
				'nettrine.migrations.executeCommand',
				'nettrine.migrations.generateCommand',
				'nettrine.migrations.latestCommand',
				'nettrine.migrations.listCommand',
				'nettrine.migrations.migrateCommand',
				'nettrine.migrations.rollupCommand',
				'nettrine.migrations.statusCommand',
				'nettrine.migrations.syncMetadataCommand',
				'nettrine.migrations.upToDateCommand',
				'nettrine.migrations.versionCommand',
			],
		],
		'Doctrine\DBAL\Tools\Console\Command\ReservedWordsCommand' => [2 => ['nettrine.dbal.console.reservedWordsCommand']],
		'Doctrine\DBAL\Tools\Console\Command\RunSqlCommand' => [2 => ['nettrine.dbal.console.runSqlCommand']],
		'Doctrine\ORM\Configuration' => [['nettrine.orm.configuration']],
		'Doctrine\ORM\Mapping\EntityListenerResolver' => [['nettrine.orm.entityListenerResolver']],
		'Nettrine\ORM\Mapping\ContainerEntityListenerResolver' => [['nettrine.orm.entityListenerResolver']],
		'Doctrine\ORM\Decorator\EntityManagerDecorator' => [['nettrine.orm.entityManagerDecorator']],
		'Doctrine\Persistence\ObjectManagerDecorator' => [['nettrine.orm.entityManagerDecorator']],
		'Doctrine\ORM\EntityManagerInterface' => [['nettrine.orm.entityManagerDecorator']],
		'Doctrine\Persistence\ObjectManager' => [['nettrine.orm.entityManagerDecorator']],
		'App\Model\Database\EntityManagerDecorator' => [['nettrine.orm.entityManagerDecorator']],
		'Doctrine\Persistence\AbstractManagerRegistry' => [['nettrine.orm.managerRegistry']],
		'Doctrine\Persistence\ConnectionRegistry' => [['nettrine.orm.managerRegistry']],
		'Doctrine\Persistence\ManagerRegistry' => [['nettrine.orm.managerRegistry']],
		'Nettrine\ORM\ManagerRegistry' => [['nettrine.orm.managerRegistry']],
		'Doctrine\Persistence\Mapping\Driver\MappingDriver' => [
			0 => ['nettrine.orm.mappingDriver'],
			2 => [1 => 'nettrine.orm.annotations.annotationDriver'],
		],
		'Doctrine\Persistence\Mapping\Driver\MappingDriverChain' => [['nettrine.orm.mappingDriver']],
		'Doctrine\ORM\Cache\RegionsConfiguration' => [2 => ['nettrine.orm.cache.regions']],
		'Doctrine\ORM\Cache\CacheFactory' => [2 => ['nettrine.orm.cache.cacheFactory']],
		'Doctrine\ORM\Cache\DefaultCacheFactory' => [2 => ['nettrine.orm.cache.cacheFactory']],
		'Doctrine\ORM\Cache\CacheConfiguration' => [2 => ['nettrine.orm.cache.cacheConfiguration']],
		'Symfony\Component\Console\Helper\Helper' => [2 => ['nettrine.orm.console.entityManagerHelper']],
		'Symfony\Component\Console\Helper\HelperInterface' => [2 => ['nettrine.orm.console.entityManagerHelper']],
		'Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper' => [2 => ['nettrine.orm.console.entityManagerHelper']],
		'Doctrine\ORM\Tools\Console\Command\SchemaTool\AbstractCommand' => [
			2 => [
				'nettrine.orm.console.schemaToolCreateCommand',
				'nettrine.orm.console.schemaToolUpdateCommand',
				'nettrine.orm.console.schemaToolDropCommand',
			],
		],
		'Doctrine\ORM\Tools\Console\Command\AbstractEntityManagerCommand' => [
			2 => [
				'nettrine.orm.console.schemaToolCreateCommand',
				'nettrine.orm.console.schemaToolUpdateCommand',
				'nettrine.orm.console.schemaToolDropCommand',
				'nettrine.orm.console.convertMappingCommand',
				'nettrine.orm.console.ensureProductionSettingsCommand',
				'nettrine.orm.console.generateEntitiesCommand',
				'nettrine.orm.console.generateProxiesCommand',
				'nettrine.orm.console.generateRepositoriesCommand',
				'nettrine.orm.console.infoCommand',
				'nettrine.orm.console.mappingDescribeCommand',
				'nettrine.orm.console.runDqlCommand',
				'nettrine.orm.console.validateSchemaCommand',
				'nettrine.orm.console.clearMetadataCacheCommand',
			],
		],
		'Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand' => [
			2 => ['nettrine.orm.console.schemaToolCreateCommand'],
		],
		'Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand' => [
			2 => ['nettrine.orm.console.schemaToolUpdateCommand'],
		],
		'Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand' => [
			2 => ['nettrine.orm.console.schemaToolDropCommand'],
		],
		'Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand' => [2 => ['nettrine.orm.console.convertMappingCommand']],
		'Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand' => [
			2 => ['nettrine.orm.console.ensureProductionSettingsCommand'],
		],
		'Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand' => [
			2 => ['nettrine.orm.console.generateEntitiesCommand'],
		],
		'Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand' => [
			2 => ['nettrine.orm.console.generateProxiesCommand'],
		],
		'Doctrine\ORM\Tools\Console\Command\GenerateRepositoriesCommand' => [
			2 => ['nettrine.orm.console.generateRepositoriesCommand'],
		],
		'Doctrine\ORM\Tools\Console\Command\InfoCommand' => [2 => ['nettrine.orm.console.infoCommand']],
		'Doctrine\ORM\Tools\Console\Command\MappingDescribeCommand' => [
			2 => ['nettrine.orm.console.mappingDescribeCommand'],
		],
		'Doctrine\ORM\Tools\Console\Command\RunDqlCommand' => [2 => ['nettrine.orm.console.runDqlCommand']],
		'Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand' => [2 => ['nettrine.orm.console.validateSchemaCommand']],
		'Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand' => [
			2 => ['nettrine.orm.console.clearMetadataCacheCommand'],
		],
		'Doctrine\ORM\Mapping\Driver\CompatibilityAnnotationDriver' => [2 => ['nettrine.orm.annotations.annotationDriver']],
		'Doctrine\ORM\Mapping\Driver\AnnotationDriver' => [2 => ['nettrine.orm.annotations.annotationDriver']],
		'Doctrine\Migrations\Metadata\Storage\MetadataStorageConfiguration' => [
			['nettrine.migrations.configuration.tableStorage'],
		],
		'Doctrine\Migrations\Metadata\Storage\TableMetadataStorageConfiguration' => [
			['nettrine.migrations.configuration.tableStorage'],
		],
		'Doctrine\Migrations\Configuration\Configuration' => [['nettrine.migrations.configuration']],
		'Doctrine\Migrations\Version\MigrationFactory' => [['nettrine.migrations.migrationFactory']],
		'Nettrine\Migrations\Version\DbalMigrationFactory' => [['nettrine.migrations.migrationFactory']],
		'Nettrine\Migrations\DI\DependencyFactory' => [2 => ['nettrine.migrations.nettrineDependencyFactory']],
		'Doctrine\Migrations\DependencyFactory' => [['nettrine.migrations.dependencyFactory']],
		'Doctrine\Migrations\Tools\Console\Command\DoctrineCommand' => [
			2 => [
				'nettrine.migrations.currentCommand',
				'nettrine.migrations.diffCommand',
				'nettrine.migrations.dumpSchemaCommand',
				'nettrine.migrations.executeCommand',
				'nettrine.migrations.generateCommand',
				'nettrine.migrations.latestCommand',
				'nettrine.migrations.listCommand',
				'nettrine.migrations.migrateCommand',
				'nettrine.migrations.rollupCommand',
				'nettrine.migrations.statusCommand',
				'nettrine.migrations.syncMetadataCommand',
				'nettrine.migrations.upToDateCommand',
				'nettrine.migrations.versionCommand',
			],
		],
		'Doctrine\Migrations\Tools\Console\Command\CurrentCommand' => [2 => ['nettrine.migrations.currentCommand']],
		'Doctrine\Migrations\Tools\Console\Command\DiffCommand' => [2 => ['nettrine.migrations.diffCommand']],
		'Doctrine\Migrations\Tools\Console\Command\DumpSchemaCommand' => [2 => ['nettrine.migrations.dumpSchemaCommand']],
		'Doctrine\Migrations\Tools\Console\Command\ExecuteCommand' => [2 => ['nettrine.migrations.executeCommand']],
		'Doctrine\Migrations\Tools\Console\Command\GenerateCommand' => [2 => ['nettrine.migrations.generateCommand']],
		'Doctrine\Migrations\Tools\Console\Command\LatestCommand' => [2 => ['nettrine.migrations.latestCommand']],
		'Doctrine\Migrations\Tools\Console\Command\ListCommand' => [2 => ['nettrine.migrations.listCommand']],
		'Doctrine\Migrations\Tools\Console\Command\MigrateCommand' => [2 => ['nettrine.migrations.migrateCommand']],
		'Doctrine\Migrations\Tools\Console\Command\RollupCommand' => [2 => ['nettrine.migrations.rollupCommand']],
		'Doctrine\Migrations\Tools\Console\Command\StatusCommand' => [2 => ['nettrine.migrations.statusCommand']],
		'Doctrine\Migrations\Tools\Console\Command\SyncMetadataCommand' => [
			2 => ['nettrine.migrations.syncMetadataCommand'],
		],
		'Doctrine\Migrations\Tools\Console\Command\UpToDateCommand' => [2 => ['nettrine.migrations.upToDateCommand']],
		'Doctrine\Migrations\Tools\Console\Command\VersionCommand' => [2 => ['nettrine.migrations.versionCommand']],
		'Doctrine\Common\DataFixtures\Loader' => [['nettrine.fixtures.fixturesLoader']],
		'Nettrine\Fixtures\Loader\FixturesLoader' => [['nettrine.fixtures.fixturesLoader']],
		'Nettrine\Fixtures\Command\LoadDataFixturesCommand' => [['nettrine.fixtures.loadDataFixturesCommand']],
		'Doctrine\Common\Cache\Cache' => [['nettrine.cache.driver']],
		'App\Domain\Api\Facade\UsersFacade' => [['01']],
		'Symfony\Component\Serializer\SerializerInterface' => [['symfony.serializer.serializer']],
		'Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface' => [['symfony.serializer.serializer']],
		'Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface' => [['symfony.serializer.serializer']],
		'Symfony\Component\Serializer\Encoder\ContextAwareEncoderInterface' => [['symfony.serializer.serializer']],
		'Symfony\Component\Serializer\Encoder\ContextAwareDecoderInterface' => [['symfony.serializer.serializer']],
		'Symfony\Component\Serializer\Normalizer\NormalizerInterface' => [
			0 => ['symfony.serializer.serializer'],
			2 => [1 => 'symfony.serializer.objectNormalizer'],
		],
		'Symfony\Component\Serializer\Normalizer\DenormalizerInterface' => [
			0 => ['symfony.serializer.serializer'],
			2 => [1 => 'symfony.serializer.objectNormalizer'],
		],
		'Symfony\Component\Serializer\Encoder\EncoderInterface' => [['symfony.serializer.serializer']],
		'Symfony\Component\Serializer\Encoder\DecoderInterface' => [['symfony.serializer.serializer']],
		'Symfony\Component\Serializer\Serializer' => [['symfony.serializer.serializer']],
		'Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer' => [
			2 => ['symfony.serializer.objectNormalizer'],
		],
		'Symfony\Component\Serializer\Normalizer\AbstractNormalizer' => [2 => ['symfony.serializer.objectNormalizer']],
		'Symfony\Component\Serializer\SerializerAwareInterface' => [2 => ['symfony.serializer.objectNormalizer']],
		'Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface' => [
			2 => ['symfony.serializer.objectNormalizer'],
		],
		'Symfony\Component\Serializer\Normalizer\ObjectNormalizer' => [2 => ['symfony.serializer.objectNormalizer']],
		'Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface' => [
			2 => ['symfony.serializer.classMetadataFactory'],
		],
		'Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory' => [
			2 => ['symfony.serializer.classMetadataFactory'],
		],
		'Symfony\Component\Serializer\Mapping\Loader\LoaderInterface' => [2 => ['symfony.serializer.annotationLoader']],
		'Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader' => [2 => ['symfony.serializer.annotationLoader']],
		'Symfony\Component\Validator\Mapping\Factory\MetadataFactoryInterface' => [['symfony.validator']],
		'Symfony\Component\Validator\Validator\ValidatorInterface' => [['symfony.validator']],
		'Symfony\Component\Validator\ValidatorBuilder' => [2 => ['symfony.validator.builder']],
		'Contributte\Middlewares\TryCatchMiddleware' => [['middleware.tryCatch']],
		'Contributte\Middlewares\LoggingMiddleware' => [['middlewares.logging']],
		'Contributte\Middlewares\MethodOverrideMiddleware' => [['middleware.methodOverride']],
		'App\Model\Api\Middleware\CORSMiddleware' => [['middleware.cors']],
		'App\Model\Api\Middleware\AuthenticationMiddleware' => [['middleware.authenticator']],
		'App\Module\V1\BaseV1Controller' => [
			['02', 'resource._App_Module_.2', 'resource._App_Module_.3', 'resource._App_Module_.4'],
		],
		'App\Module\BaseController' => [
			['02', 'resource._App_Module_.2', 'resource._App_Module_.3', 'resource._App_Module_.4'],
		],
		'Apitte\Core\UI\Controller\IController' => [
			[
				'02',
				'resource._App_Module_.1',
				'resource._App_Module_.2',
				'resource._App_Module_.3',
				'resource._App_Module_.4',
			],
		],
		'App\Module\V1\StaticController' => [['02']],
		'App\Module\PubV1\BasePubV1Controller' => [['resource._App_Module_.1']],
		'App\Module\BasePubController' => [['resource._App_Module_.1']],
		'App\Module\PubV1\OpenApiController' => [['resource._App_Module_.1']],
		'App\Module\V1\UserCreateController' => [['resource._App_Module_.2']],
		'App\Module\V1\UsersController' => [['resource._App_Module_.3']],
		'App\Module\V1\UsersOneController' => [['resource._App_Module_.4']],
		'Apitte\Core\Schema\Serialization\IHydrator' => [['api.core.schema.hydrator']],
		'Apitte\Core\Schema\Serialization\ArrayHydrator' => [['api.core.schema.hydrator']],
	];


	public function __construct(array $params = [])
	{
		parent::__construct($params);
	}


	public function createService01(): App\Domain\Api\Facade\UsersFacade
	{
		return new App\Domain\Api\Facade\UsersFacade($this->getService('nettrine.orm.entityManagerDecorator'));
	}


	public function createService02(): App\Module\V1\StaticController
	{
		return new App\Module\V1\StaticController('This is example of static text');
	}


	public function createServiceApi__core__application(): Apitte\Core\Application\IApplication
	{
		return new Apitte\Core\Application\Application(
			$this->getService('api.core.errorHandler'),
			$this->getService('api.core.dispatcher'),
		);
	}


	public function createServiceApi__core__dispatcher(): App\Model\Api\Dispatcher\JsonDispatcher
	{
		return new App\Model\Api\Dispatcher\JsonDispatcher(
			$this->getService('api.core.router'),
			$this->getService('api.core.handler'),
			$this->getService('symfony.serializer.serializer'),
			$this->getService('symfony.validator'),
		);
	}


	public function createServiceApi__core__errorHandler(): Apitte\Core\ErrorHandler\IErrorHandler
	{
		$service = new Apitte\Core\ErrorHandler\PsrLogErrorHandler($this->getService('monolog.logger.default'));
		$service->setCatchException(true);
		return $service;
	}


	public function createServiceApi__core__handler(): Apitte\Core\Handler\IHandler
	{
		return new Apitte\Core\Handler\ServiceHandler($this);
	}


	public function createServiceApi__core__router(): Apitte\Core\Router\IRouter
	{
		return new Apitte\Core\Router\SimpleRouter($this->getService('api.core.schema'));
	}


	public function createServiceApi__core__schema(): Apitte\Core\Schema\Schema
	{
		return $this->getService('api.core.schema.hydrator')->hydrate([
			[
				'handler' => ['class' => 'App\Module\PubV1\OpenApiController', 'method' => 'meta'],
				'id' => null,
				'tags' => ['OpenApi' => null],
				'methods' => ['GET'],
				'mask' => '/api/public/v1/openapi/meta',
				'parameters' => [],
				'responses' => [],
				'negotiations' => [],
				'attributes' => ['pattern' => '/api/public/v1/openapi/meta'],
				'openApi' => ['controller' => [], 'method' => ['summary' => 'Get OpenAPI definition.']],
			],
			[
				'handler' => ['class' => 'App\Module\V1\StaticController', 'method' => 'text'],
				'id' => null,
				'tags' => ['Static' => null],
				'methods' => ['GET'],
				'mask' => '/api/v1/static/text',
				'parameters' => [],
				'responses' => [],
				'negotiations' => [],
				'attributes' => ['pattern' => '/api/v1/static/text'],
				'openApi' => ['controller' => [], 'method' => ['summary' => 'Get static text']],
			],
			[
				'handler' => ['class' => 'App\Module\V1\UserCreateController', 'method' => 'create'],
				'id' => null,
				'tags' => ['Users' => null],
				'methods' => ['POST'],
				'mask' => '/api/v1/users/create',
				'parameters' => [],
				'responses' => [],
				'negotiations' => [],
				'attributes' => ['pattern' => '/api/v1/users/create'],
				'openApi' => ['controller' => [], 'method' => ['summary' => 'Create new user.']],
				'requestBody' => [
					'description' => null,
					'required' => false,
					'validation' => true,
					'entity' => 'App\Domain\Api\Request\CreateUserReqDto',
				],
			],
			[
				'handler' => ['class' => 'App\Module\V1\UsersOneController', 'method' => 'byEmail'],
				'id' => null,
				'tags' => ['Users' => null],
				'methods' => ['GET'],
				'mask' => '/api/v1/users/email',
				'parameters' => [
					'email' => [
						'name' => 'email',
						'type' => 'string',
						'description' => 'User e-mail address',
						'in' => 'query',
						'required' => true,
						'allowEmpty' => false,
						'deprecated' => false,
					],
				],
				'responses' => [],
				'negotiations' => [],
				'attributes' => ['pattern' => '/api/v1/users/email'],
				'openApi' => ['controller' => [], 'method' => ['summary' => 'Get user by email.']],
			],
			[
				'handler' => ['class' => 'App\Module\V1\UsersOneController', 'method' => 'byId'],
				'id' => null,
				'tags' => ['Users' => null],
				'methods' => ['GET'],
				'mask' => '/api/v1/users/{id}',
				'parameters' => [
					'id' => [
						'name' => 'id',
						'type' => 'int',
						'description' => 'User ID',
						'in' => 'path',
						'required' => true,
						'allowEmpty' => false,
						'deprecated' => false,
					],
				],
				'responses' => [],
				'negotiations' => [],
				'attributes' => ['pattern' => '/api/v1/users/(?P<id>[^/]+)'],
				'openApi' => ['controller' => [], 'method' => ['summary' => 'Get user by id.']],
			],
			[
				'handler' => ['class' => 'App\Module\V1\UsersController', 'method' => 'index'],
				'id' => null,
				'tags' => ['Users' => null],
				'methods' => ['GET'],
				'mask' => '/api/v1/users',
				'parameters' => [
					'limit' => [
						'name' => 'limit',
						'type' => 'int',
						'description' => 'Data limit',
						'in' => 'query',
						'required' => false,
						'allowEmpty' => false,
						'deprecated' => false,
					],
					'offset' => [
						'name' => 'offset',
						'type' => 'int',
						'description' => 'Data offset',
						'in' => 'query',
						'required' => false,
						'allowEmpty' => false,
						'deprecated' => false,
					],
				],
				'responses' => [],
				'negotiations' => [],
				'attributes' => ['pattern' => '/api/v1/users'],
				'openApi' => ['controller' => [], 'method' => ['summary' => 'List users.']],
			],
		]);
	}


	public function createServiceApi__core__schema__hydrator(): Apitte\Core\Schema\Serialization\ArrayHydrator
	{
		return new Apitte\Core\Schema\Serialization\ArrayHydrator;
	}


	public function createServiceApi__middlewares__api(): Apitte\Middlewares\ApiMiddleware
	{
		return new Apitte\Middlewares\ApiMiddleware(
			$this->getService('api.core.dispatcher'),
			$this->getService('api.core.errorHandler'),
		);
	}


	public function createServiceApi__middlewares__autobasepath(): Contributte\Middlewares\AutoBasePathMiddleware
	{
		return new Contributte\Middlewares\AutoBasePathMiddleware;
	}


	public function createServiceApi__openapi__coreDefinition(): Apitte\OpenApi\SchemaDefinition\CoreDefinition
	{
		return new Apitte\OpenApi\SchemaDefinition\CoreDefinition(
			$this->getService('api.core.schema'),
			$this->getService('api.openapi.entityAdapter'),
		);
	}


	public function createServiceApi__openapi__entityAdapter(): Apitte\OpenApi\SchemaDefinition\Entity\EntityAdapter
	{
		return new Apitte\OpenApi\SchemaDefinition\Entity\EntityAdapter;
	}


	public function createServiceApi__openapi__schemaBuilder(): Apitte\OpenApi\SchemaBuilder
	{
		$service = new Apitte\OpenApi\SchemaBuilder;
		$service->addDefinition(\Nette\PhpGenerator\Dumper::createObject(\Apitte\OpenApi\SchemaDefinition\BaseDefinition::class, [
		]));
		$service->addDefinition($this->getService('api.openapi.coreDefinition'));
		$service->addDefinition(\Nette\PhpGenerator\Dumper::createObject(\Apitte\OpenApi\SchemaDefinition\ArrayDefinition::class, [
			"\x00Apitte\\OpenApi\\SchemaDefinition\\ArrayDefinition\x00data" => [],
		]));
		return $service;
	}


	public function createServiceConsole__application(): Contributte\Console\Application
	{
		$service = new Contributte\Console\Application;
		$service->setCommandLoader($this->getService('console.commandLoader'));
		$service->getHelperSet()->set($this->getService('nettrine.orm.console.entityManagerHelper'),'em');
		return $service;
	}


	public function createServiceConsole__commandLoader(): Symfony\Component\Console\CommandLoader\CommandLoaderInterface
	{
		return new Contributte\Console\CommandLoader\ContainerCommandLoader(
			$this,
			[
				'dbal:reserved-words' => 'nettrine.dbal.console.reservedWordsCommand',
				'dbal:run-sql' => 'nettrine.dbal.console.runSqlCommand',
				'orm:schema-tool:create' => 'nettrine.orm.console.schemaToolCreateCommand',
				'orm:schema-tool:update' => 'nettrine.orm.console.schemaToolUpdateCommand',
				'orm:schema-tool:drop' => 'nettrine.orm.console.schemaToolDropCommand',
				'orm:convert-mapping' => 'nettrine.orm.console.convertMappingCommand',
				'orm:ensure-production-settings' => 'nettrine.orm.console.ensureProductionSettingsCommand',
				'orm:generate-entities' => 'nettrine.orm.console.generateEntitiesCommand',
				'orm:generate-proxies' => 'nettrine.orm.console.generateProxiesCommand',
				'orm:generate-repositories' => 'nettrine.orm.console.generateRepositoriesCommand',
				'orm:info' => 'nettrine.orm.console.infoCommand',
				'orm:mapping:describe' => 'nettrine.orm.console.mappingDescribeCommand',
				'orm:run-dql' => 'nettrine.orm.console.runDqlCommand',
				'orm:validate-schema' => 'nettrine.orm.console.validateSchemaCommand',
				'orm:clear-cache:metadata' => 'nettrine.orm.console.clearMetadataCacheCommand',
				'migrations:current' => 'nettrine.migrations.currentCommand',
				'migrations:diff' => 'nettrine.migrations.diffCommand',
				'migrations:dump-schema' => 'nettrine.migrations.dumpSchemaCommand',
				'migrations:execute' => 'nettrine.migrations.executeCommand',
				'migrations:generate' => 'nettrine.migrations.generateCommand',
				'migrations:latest' => 'nettrine.migrations.latestCommand',
				'migrations:list' => 'nettrine.migrations.listCommand',
				'migrations:migrate' => 'nettrine.migrations.migrateCommand',
				'migrations:rollup' => 'nettrine.migrations.rollupCommand',
				'migrations:status' => 'nettrine.migrations.statusCommand',
				'migrations:sync-metadata-storage' => 'nettrine.migrations.syncMetadataCommand',
				'migrations:up-to-date' => 'nettrine.migrations.upToDateCommand',
				'migrations:version' => 'nettrine.migrations.versionCommand',
				'doctrine:fixtures:load' => 'nettrine.fixtures.loadDataFixturesCommand',
			],
		);
	}


	public function createServiceContainer(): Container_e8ce9dd9d4
	{
		return $this;
	}


	public function createServiceHttp__request(): Nette\Http\Request
	{
		return new Nette\Http\Request(new Nette\Http\UrlScript('http://localhost/'));
	}


	public function createServiceHttp__requestFactory(): Nette\Http\RequestFactory
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy([]);
		return $service;
	}


	public function createServiceHttp__response(): Nette\Http\Response
	{
		$service = new Nette\Http\Response;
		$service->cookieSecure = $this->getService('http.request')->isSecured();
		return $service;
	}


	public function createServiceMiddleware__authenticator(): App\Model\Api\Middleware\AuthenticationMiddleware
	{
		return new App\Model\Api\Middleware\AuthenticationMiddleware(new App\Model\Api\Security\TokenAuthenticator($this->getService('nettrine.orm.entityManagerDecorator')));
	}


	public function createServiceMiddleware__cors(): App\Model\Api\Middleware\CORSMiddleware
	{
		return new App\Model\Api\Middleware\CORSMiddleware;
	}


	public function createServiceMiddleware__methodOverride(): Contributte\Middlewares\MethodOverrideMiddleware
	{
		return new Contributte\Middlewares\MethodOverrideMiddleware;
	}


	public function createServiceMiddleware__tryCatch(): Contributte\Middlewares\TryCatchMiddleware
	{
		$service = new Contributte\Middlewares\TryCatchMiddleware;
		$service->setDebugMode(true);
		$service->setCatchExceptions(false);
		$service->setLogger($this->getService('monolog.logger.default'), Psr\Log\LogLevel::ERROR);
		return $service;
	}


	public function createServiceMiddlewares__application(): Contributte\Middlewares\Application\MiddlewareApplication
	{
		return new Contributte\Middlewares\Application\MiddlewareApplication($this->getService('middlewares.chain')->create());
	}


	public function createServiceMiddlewares__chain(): Contributte\Middlewares\Utils\ChainBuilder
	{
		$service = new Contributte\Middlewares\Utils\ChainBuilder;
		$service->add($this->getService('middleware.tryCatch'));
		$service->add($this->getService('middlewares.logging'));
		$service->add($this->getService('middleware.methodOverride'));
		$service->add($this->getService('api.middlewares.autobasepath'));
		$service->add($this->getService('middleware.cors'));
		$service->add($this->getService('middleware.authenticator'));
		$service->add($this->getService('api.middlewares.api'));
		return $service;
	}


	public function createServiceMiddlewares__logging(): Contributte\Middlewares\LoggingMiddleware
	{
		return new Contributte\Middlewares\LoggingMiddleware($this->getService('monolog.logger.default'));
	}


	public function createServiceMonolog__logger__default(): Monolog\Logger
	{
		return new Monolog\Logger(
			'default',
			[$this->getService('monolog.logger.default.handler.0')],
			[
				$this->getService('monolog.logger.default.processor.0'),
				$this->getService('monolog.logger.default.processor.1'),
				$this->getService('monolog.logger.default.processor.2'),
				$this->getService('monolog.logger.default.processor.3'),
			],
		);
	}


	public function createServiceMonolog__logger__default__handler__0(): Monolog\Handler\RotatingFileHandler
	{
		return new Monolog\Handler\RotatingFileHandler('/var/www/html/app/../var/log/syslog.log', 30, Monolog\Logger::WARNING);
	}


	public function createServiceMonolog__logger__default__processor__0(): Monolog\Processor\WebProcessor
	{
		return new Monolog\Processor\WebProcessor;
	}


	public function createServiceMonolog__logger__default__processor__1(): Monolog\Processor\IntrospectionProcessor
	{
		return new Monolog\Processor\IntrospectionProcessor;
	}


	public function createServiceMonolog__logger__default__processor__2(): Monolog\Processor\MemoryPeakUsageProcessor
	{
		return new Monolog\Processor\MemoryPeakUsageProcessor;
	}


	public function createServiceMonolog__logger__default__processor__3(): Monolog\Processor\ProcessIdProcessor
	{
		return new Monolog\Processor\ProcessIdProcessor;
	}


	public function createServiceMonolog__psrToTracyAdapter(): Tracy\Bridges\Psr\PsrToTracyLoggerAdapter
	{
		return new Tracy\Bridges\Psr\PsrToTracyLoggerAdapter($this->getService('monolog.logger.default'));
	}


	public function createServiceMonolog__psrToTracyLazyAdapter(): Contributte\Monolog\Tracy\LazyTracyLogger
	{
		return new Contributte\Monolog\Tracy\LazyTracyLogger('monolog.psrToTracyAdapter', $this);
	}


	public function createServiceNettrine__annotations__delegatedReader(): Doctrine\Common\Annotations\AnnotationReader
	{
		$service = new Doctrine\Common\Annotations\AnnotationReader;
		$service->addGlobalIgnoredName('persistent');
		$service->addGlobalIgnoredName('serializationVersion');
		return $service;
	}


	public function createServiceNettrine__annotations__reader(): Doctrine\Common\Annotations\Reader
	{
		return new Doctrine\Common\Annotations\CachedReader(
			$this->getService('nettrine.annotations.delegatedReader'),
			$this->getService('nettrine.cache.driver'),
			false,
		);
	}


	public function createServiceNettrine__cache__driver(): Doctrine\Common\Cache\Cache
	{
		return new Doctrine\Common\Cache\PhpFileCache('/var/www/html/app/../var/tmp/cache/nettrine.cache');
	}


	public function createServiceNettrine__dbal__configuration(): Doctrine\DBAL\Configuration
	{
		$service = new Doctrine\DBAL\Configuration;
		$service->setSQLLogger($this->getService('nettrine.dbal.logger'));
		$service->setResultCacheImpl($this->getService('nettrine.cache.driver'));
		$service->setAutoCommit(true);
		return $service;
	}


	public function createServiceNettrine__dbal__connection(): Doctrine\DBAL\Connection
	{
		$service = $this->getService('nettrine.dbal.connectionFactory')->createConnection(
			[
				'driver' => 'pdo_pgsql',
				'host' => '0.0.0.0',
				'user' => 'products-api',
				'password' => 'cloud',
				'dbname' => 'products-api',
				'port' => 5432,
				'serverVersion' => 14,
				'types' => [],
				'typesMapping' => [],
			],
			$this->getService('nettrine.dbal.configuration'),
			$this->getService('nettrine.dbal.eventManager.debug'),
		);
		$this->getService('tracy.bar')->addPanel(new Nettrine\DBAL\Tracy\QueryPanel\QueryPanel($this->getService('nettrine.dbal.profiler')));
		$this->getService('tracy.blueScreen')->addPanel(['Nettrine\DBAL\Tracy\BlueScreen\DbalBlueScreen', 'renderException']);
		return $service;
	}


	public function createServiceNettrine__dbal__connectionAccessor(): Nettrine\DBAL\ConnectionAccessor
	{
		return new class ($this) implements Nettrine\DBAL\ConnectionAccessor {
			private $container;


			public function __construct(Container_e8ce9dd9d4 $container)
			{
				$this->container = $container;
			}


			public function get(): Doctrine\DBAL\Connection
			{
				return $this->container->getService('nettrine.dbal.connection');
			}
		};
	}


	public function createServiceNettrine__dbal__connectionFactory(): Nettrine\DBAL\ConnectionFactory
	{
		return new Nettrine\DBAL\ConnectionFactory([], []);
	}


	public function createServiceNettrine__dbal__console__connectionProvider(
	): Doctrine\DBAL\Tools\Console\ConnectionProvider\SingleConnectionProvider
	{
		return new Doctrine\DBAL\Tools\Console\ConnectionProvider\SingleConnectionProvider($this->getService('nettrine.dbal.connection'));
	}


	public function createServiceNettrine__dbal__console__reservedWordsCommand(
	): Doctrine\DBAL\Tools\Console\Command\ReservedWordsCommand
	{
		return new Doctrine\DBAL\Tools\Console\Command\ReservedWordsCommand($this->getService('nettrine.dbal.console.connectionProvider'));
	}


	public function createServiceNettrine__dbal__console__runSqlCommand(
	): Doctrine\DBAL\Tools\Console\Command\RunSqlCommand
	{
		return new Doctrine\DBAL\Tools\Console\Command\RunSqlCommand($this->getService('nettrine.dbal.console.connectionProvider'));
	}


	public function createServiceNettrine__dbal__eventManager(): Nettrine\DBAL\Events\ContainerAwareEventManager
	{
		return new Nettrine\DBAL\Events\ContainerAwareEventManager($this);
	}


	public function createServiceNettrine__dbal__eventManager__debug(): Nettrine\DBAL\Events\DebugEventManager
	{
		return new Nettrine\DBAL\Events\DebugEventManager($this->getService('nettrine.dbal.eventManager'));
	}


	public function createServiceNettrine__dbal__logger(): Doctrine\DBAL\Logging\LoggerChain
	{
		return new Doctrine\DBAL\Logging\LoggerChain([
			$this->getService('nettrine.dbal.logger.config'),
			$this->getService('nettrine.dbal.profiler'),
		]);
	}


	public function createServiceNettrine__dbal__logger__config(): Nettrine\DBAL\Logger\PsrLogger
	{
		return new Nettrine\DBAL\Logger\PsrLogger($this->getService('monolog.logger.default'));
	}


	public function createServiceNettrine__dbal__profiler(): Nettrine\DBAL\Logger\ProfilerLogger
	{
		return new Nettrine\DBAL\Logger\ProfilerLogger($this->getService('nettrine.dbal.connectionAccessor'));
	}


	public function createServiceNettrine__fixtures__fixturesLoader(): Nettrine\Fixtures\Loader\FixturesLoader
	{
		return new Nettrine\Fixtures\Loader\FixturesLoader(['/var/www/html/db/Fixtures'], $this);
	}


	public function createServiceNettrine__fixtures__loadDataFixturesCommand(
	): Nettrine\Fixtures\Command\LoadDataFixturesCommand
	{
		return new Nettrine\Fixtures\Command\LoadDataFixturesCommand(
			$this->getService('nettrine.fixtures.fixturesLoader'),
			$this->getService('nettrine.orm.managerRegistry'),
		);
	}


	public function createServiceNettrine__migrations__configuration(): Doctrine\Migrations\Configuration\Configuration
	{
		$service = new Doctrine\Migrations\Configuration\Configuration;
		$service->setCustomTemplate(null);
		$service->setMetadataStorageConfiguration($this->getService('nettrine.migrations.configuration.tableStorage'));
		$service->addMigrationsDirectory('Database\Migrations', '/var/www/html/db/Migrations');
		$service->setAllOrNothing(false);
		return $service;
	}


	public function createServiceNettrine__migrations__configuration__tableStorage(
	): Doctrine\Migrations\Metadata\Storage\TableMetadataStorageConfiguration
	{
		$service = new Doctrine\Migrations\Metadata\Storage\TableMetadataStorageConfiguration;
		$service->setTableName('doctrine_migrations');
		$service->setVersionColumnName('version');
		return $service;
	}


	public function createServiceNettrine__migrations__currentCommand(
	): Doctrine\Migrations\Tools\Console\Command\CurrentCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\CurrentCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__dependencyFactory(): Doctrine\Migrations\DependencyFactory
	{
		return $this->getService('nettrine.migrations.nettrineDependencyFactory')->createDependencyFactory();
	}


	public function createServiceNettrine__migrations__diffCommand(
	): Doctrine\Migrations\Tools\Console\Command\DiffCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\DiffCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__dumpSchemaCommand(
	): Doctrine\Migrations\Tools\Console\Command\DumpSchemaCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\DumpSchemaCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__executeCommand(
	): Doctrine\Migrations\Tools\Console\Command\ExecuteCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\ExecuteCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__generateCommand(
	): Doctrine\Migrations\Tools\Console\Command\GenerateCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\GenerateCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__latestCommand(
	): Doctrine\Migrations\Tools\Console\Command\LatestCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\LatestCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__listCommand(
	): Doctrine\Migrations\Tools\Console\Command\ListCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\ListCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__migrateCommand(
	): Doctrine\Migrations\Tools\Console\Command\MigrateCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\MigrateCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__migrationFactory(
	): Nettrine\Migrations\Version\DbalMigrationFactory
	{
		return new Nettrine\Migrations\Version\DbalMigrationFactory(
			$this,
			$this->getService('nettrine.dbal.connection'),
			$this->getService('monolog.logger.default'),
		);
	}


	public function createServiceNettrine__migrations__nettrineDependencyFactory(
	): Nettrine\Migrations\DI\DependencyFactory
	{
		return new Nettrine\Migrations\DI\DependencyFactory(
			$this->getService('nettrine.migrations.configuration'),
			$this->getService('nettrine.migrations.migrationFactory'),
			$this->getService('nettrine.dbal.connection'),
			$this->getService('nettrine.orm.entityManagerDecorator'),
			$this->getService('monolog.logger.default'),
		);
	}


	public function createServiceNettrine__migrations__rollupCommand(
	): Doctrine\Migrations\Tools\Console\Command\RollupCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\RollupCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__statusCommand(
	): Doctrine\Migrations\Tools\Console\Command\StatusCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\StatusCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__syncMetadataCommand(
	): Doctrine\Migrations\Tools\Console\Command\SyncMetadataCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\SyncMetadataCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__upToDateCommand(
	): Doctrine\Migrations\Tools\Console\Command\UpToDateCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\UpToDateCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__versionCommand(
	): Doctrine\Migrations\Tools\Console\Command\VersionCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\VersionCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__orm__annotations__annotationDriver(
	): Doctrine\ORM\Mapping\Driver\AnnotationDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('nettrine.annotations.reader'));
		$service->addExcludePaths([]);
		$service->addPaths(['/var/www/html/app/Domain']);
		return $service;
	}


	public function createServiceNettrine__orm__cache__cacheConfiguration(): Doctrine\ORM\Cache\CacheConfiguration
	{
		$service = new Doctrine\ORM\Cache\CacheConfiguration;
		$service->setCacheFactory($this->getService('nettrine.orm.cache.cacheFactory'));
		return $service;
	}


	public function createServiceNettrine__orm__cache__cacheFactory(): Doctrine\ORM\Cache\DefaultCacheFactory
	{
		return new Doctrine\ORM\Cache\DefaultCacheFactory(
			$this->getService('nettrine.orm.cache.regions'),
			$this->getService('nettrine.cache.driver'),
		);
	}


	public function createServiceNettrine__orm__cache__regions(): Doctrine\ORM\Cache\RegionsConfiguration
	{
		return new Doctrine\ORM\Cache\RegionsConfiguration;
	}


	public function createServiceNettrine__orm__configuration(): Doctrine\ORM\Configuration
	{
		$service = new Doctrine\ORM\Configuration;
		$service->setProxyDir('/var/www/html/app/../var/tmp/proxies');
		$service->setAutoGenerateProxyClasses(2);
		$service->setProxyNamespace('Nettrine\Proxy');
		$service->setMetadataDriverImpl($this->getService('nettrine.orm.mappingDriver'));
		$service->setCustomStringFunctions([]);
		$service->setCustomNumericFunctions([]);
		$service->setCustomDatetimeFunctions([]);
		$service->setCustomHydrationModes([]);
		$service->setNamingStrategy(new Doctrine\ORM\Mapping\UnderscoreNamingStrategy);
		$service->setEntityListenerResolver($this->getService('nettrine.orm.entityListenerResolver'));
		$service->setQueryCacheImpl($this->getService('nettrine.cache.driver'));
		$service->setHydrationCacheImpl($this->getService('nettrine.cache.driver'));
		$service->setResultCacheImpl($this->getService('nettrine.cache.driver'));
		$service->setMetadataCacheImpl($this->getService('nettrine.cache.driver'));
		$service->setSecondLevelCacheEnabled(true);
		$service->setSecondLevelCacheConfiguration($this->getService('nettrine.orm.cache.cacheConfiguration'));
		return $service;
	}


	public function createServiceNettrine__orm__console__clearMetadataCacheCommand(
	): Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand
	{
		return new Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand;
	}


	public function createServiceNettrine__orm__console__convertMappingCommand(
	): Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand
	{
		return new Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand;
	}


	public function createServiceNettrine__orm__console__ensureProductionSettingsCommand(
	): Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand
	{
		return new Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand;
	}


	public function createServiceNettrine__orm__console__entityManagerHelper(
	): Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper
	{
		return new Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($this->getService('nettrine.orm.entityManagerDecorator'));
	}


	public function createServiceNettrine__orm__console__generateEntitiesCommand(
	): Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand
	{
		return new Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand;
	}


	public function createServiceNettrine__orm__console__generateProxiesCommand(
	): Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand
	{
		return new Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand;
	}


	public function createServiceNettrine__orm__console__generateRepositoriesCommand(
	): Doctrine\ORM\Tools\Console\Command\GenerateRepositoriesCommand
	{
		return new Doctrine\ORM\Tools\Console\Command\GenerateRepositoriesCommand;
	}


	public function createServiceNettrine__orm__console__infoCommand(): Doctrine\ORM\Tools\Console\Command\InfoCommand
	{
		return new Doctrine\ORM\Tools\Console\Command\InfoCommand;
	}


	public function createServiceNettrine__orm__console__mappingDescribeCommand(
	): Doctrine\ORM\Tools\Console\Command\MappingDescribeCommand
	{
		return new Doctrine\ORM\Tools\Console\Command\MappingDescribeCommand;
	}


	public function createServiceNettrine__orm__console__runDqlCommand(
	): Doctrine\ORM\Tools\Console\Command\RunDqlCommand
	{
		return new Doctrine\ORM\Tools\Console\Command\RunDqlCommand;
	}


	public function createServiceNettrine__orm__console__schemaToolCreateCommand(
	): Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand
	{
		return new Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand;
	}


	public function createServiceNettrine__orm__console__schemaToolDropCommand(
	): Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand
	{
		return new Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand;
	}


	public function createServiceNettrine__orm__console__schemaToolUpdateCommand(
	): Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand
	{
		return new Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand;
	}


	public function createServiceNettrine__orm__console__validateSchemaCommand(
	): Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand
	{
		return new Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand;
	}


	public function createServiceNettrine__orm__entityListenerResolver(
	): Nettrine\ORM\Mapping\ContainerEntityListenerResolver
	{
		return new Nettrine\ORM\Mapping\ContainerEntityListenerResolver($this);
	}


	public function createServiceNettrine__orm__entityManagerDecorator(): App\Model\Database\EntityManagerDecorator
	{
		return new App\Model\Database\EntityManagerDecorator(Doctrine\ORM\EntityManager::create(
			$this->getService('nettrine.dbal.connection'),
			$this->getService('nettrine.orm.configuration'),
			$this->getService('nettrine.dbal.eventManager.debug'),
		));
	}


	public function createServiceNettrine__orm__managerRegistry(): Nettrine\ORM\ManagerRegistry
	{
		return new Nettrine\ORM\ManagerRegistry(
			$this->getService('nettrine.dbal.connection'),
			$this->getService('nettrine.orm.entityManagerDecorator'),
			$this,
		);
	}


	public function createServiceNettrine__orm__mappingDriver(): Doctrine\Persistence\Mapping\Driver\MappingDriverChain
	{
		$service = new Doctrine\Persistence\Mapping\Driver\MappingDriverChain;
		$service->addDriver($this->getService('nettrine.orm.annotations.annotationDriver'), 'App\Domain');
		return $service;
	}


	public function createServiceResource___App_Module___1(): App\Module\PubV1\OpenApiController
	{
		return new App\Module\PubV1\OpenApiController($this->getService('api.openapi.schemaBuilder'));
	}


	public function createServiceResource___App_Module___2(): App\Module\V1\UserCreateController
	{
		return new App\Module\V1\UserCreateController($this->getService('01'));
	}


	public function createServiceResource___App_Module___3(): App\Module\V1\UsersController
	{
		return new App\Module\V1\UsersController($this->getService('01'));
	}


	public function createServiceResource___App_Module___4(): App\Module\V1\UsersOneController
	{
		return new App\Module\V1\UsersOneController($this->getService('01'));
	}


	public function createServiceSession__session(): Nette\Http\Session
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setOptions(['cookieSamesite' => 'Lax']);
		return $service;
	}


	public function createServiceSymfony__serializer__annotationLoader(
	): Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader
	{
		return new Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader(new Doctrine\Common\Annotations\CachedReader(
			$this->getService('symfony.serializer.annotationReader'),
			new Doctrine\Common\Cache\FilesystemCache('/var/www/html/app/../var/tmp/cache/Symfony.Serializer'),
		));
	}


	public function createServiceSymfony__serializer__annotationReader(): Doctrine\Common\Annotations\AnnotationReader
	{
		$service = new Doctrine\Common\Annotations\AnnotationReader;
		$service->addGlobalIgnoredName('phpcsSuppress');
		return $service;
	}


	public function createServiceSymfony__serializer__classMetadataFactory(
	): Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory
	{
		return new Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory($this->getService('symfony.serializer.annotationLoader'));
	}


	public function createServiceSymfony__serializer__objectNormalizer(
	): Symfony\Component\Serializer\Normalizer\ObjectNormalizer
	{
		return new Symfony\Component\Serializer\Normalizer\ObjectNormalizer(
			$this->getService('symfony.serializer.classMetadataFactory'),
			new Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter,
			null,
			new Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor,
		);
	}


	public function createServiceSymfony__serializer__serializer(): Symfony\Component\Serializer\Serializer
	{
		return new Symfony\Component\Serializer\Serializer(
			[
				new Symfony\Component\Serializer\Normalizer\DateTimeNormalizer,
				new Symfony\Component\Serializer\Normalizer\ArrayDenormalizer,
				$this->getService('symfony.serializer.objectNormalizer'),
			],
			[new Symfony\Component\Serializer\Encoder\JsonEncoder],
		);
	}


	public function createServiceSymfony__validator(): Symfony\Component\Validator\Validator\ValidatorInterface
	{
		return $this->getService('symfony.validator.builder')->getValidator();
	}


	public function createServiceSymfony__validator__builder(): Symfony\Component\Validator\ValidatorBuilder
	{
		return Symfony\Component\Validator\Validation::createValidatorBuilder()->enableAnnotationMapping(new Doctrine\Common\Annotations\CachedReader(
			$this->getService('symfony.serializer.annotationReader'),
			new Doctrine\Common\Cache\FilesystemCache('/var/www/html/app/../var/tmp/cache/Symfony.Validator'),
		));
	}


	public function createServiceTracy__bar(): Tracy\Bar
	{
		return Tracy\Debugger::getBar();
	}


	public function createServiceTracy__blueScreen(): Tracy\BlueScreen
	{
		return Tracy\Debugger::getBlueScreen();
	}


	public function createServiceTracy__logger(): Tracy\ILogger
	{
		return Tracy\Debugger::getLogger();
	}


	public function initialize(): void
	{
		Doctrine\Common\Annotations\AnnotationRegistry::registerUniqueLoader("class_exists");
		// php.
		(function () {
			ini_set('date.timezone', (string) ('Europe/Prague'));
			ini_set('output_buffering', (string) (4096));
		})();
		// tracy.
		(function () {
			if (!Tracy\Debugger::isEnabled()) { return; }
			$logger = $this->getService('tracy.logger');
			Tracy\Debugger::$email = 'dev@dev.dev';
			Tracy\Debugger::$logSeverity = 32767;
			Tracy\Debugger::$strictMode = true;
		})();
		Apitte\Debug\Tracy\BlueScreen\ApiBlueScreen::register($this->getService('tracy.blueScreen'));
		Apitte\Debug\Tracy\BlueScreen\ValidationBlueScreen::register($this->getService('tracy.blueScreen'));
		$this->getService("tracy.logger");
		Tracy\Debugger::setLogger($this->getService('monolog.psrToTracyLazyAdapter'));
		Contributte\Monolog\LoggerHolder::setLogger('monolog.logger.default', $this);
	}


	protected function getStaticParameters(): array
	{
		return [
			'system' => ['error' => ['email' => 'dev@dev.dev', 'presenter' => 'Front:Error']],
			'static' => ['text' => 'This is example of static text'],
			'database' => [
				'driver' => 'pdo_pgsql',
				'port' => 5432,
				'serverVersion' => 14,
				'host' => '0.0.0.0',
				'dbname' => 'products-api',
				'user' => 'products-api',
				'password' => 'cloud',
			],
			'appDir' => '/var/www/html/app',
			'wwwDir' => '/var/www/html/www',
			'debugMode' => true,
			'productionMode' => false,
			'consoleMode' => true,
			'tempDir' => '/var/www/html/app/../var/tmp',
			'rootDir' => '/var/www/html',
		];
	}
}
