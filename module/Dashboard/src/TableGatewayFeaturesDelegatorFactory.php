<?php 
namespace Dashboard;

use Zend\Db\TableGateway\Feature;
use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TableGatewayFeaturesDelegatorFactory implements DelegatorFactoryInterface
{
    public function createDelegatorWithName(
        ServiceLocatorInterface $services,
        $name,
        $requestedName,
        $callback
        ) {
            $table  = $callback();
            $config = $services->get('Config');
            
            // TableGateway service for DB-Connected ends in "\\Table"; strip that
            $resourceName = substr($requestedName, 0, strlen($requestedName) - 6);
            $config = $config['zf-apigility']['db-connected'][$resourceName];
            
            if (! isset($config['features'])) {
                return $table;
            }
            
            $featureSet = $table->getFeatureSet();
            foreach ($config['features'] as $featureName => $options) {
                // logic to create feature...
                switch ($featureName) {
                    case 'sequence':
                        $feature = new Feature\SequenceFeature(
                        $options['primaryKeyField'],
                        $options['sequenceName']
                        );
                        break;
                    default:
                        // Unknown feature; do nothing
                        continue;
                }
                
                // and then add it to the feature-set
                $featureSet->addFeature($feature);
            }
            
            return $table;
    }
}
?>