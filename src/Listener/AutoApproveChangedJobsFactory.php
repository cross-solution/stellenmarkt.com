<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2018 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Gastro24\Listener;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Factory for \Gastro24\Repository\Events\AutoApproveChangedJobs
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test  
 */
class AutoApproveChangedJobsFactory implements FactoryInterface
{
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $repositories = $container->get('repositories');
        $snaphots     = $repositories->get('Jobs/JobSnapshot');
        $jobs         = $repositories->get('Jobs');
        $service      = new AutoApproveChangedJobs($jobs, $snaphots);
        
        return $service;    
    }
}