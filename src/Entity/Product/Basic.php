<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2018 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Gastro24\Entity\Product;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * ${CARET}
 *
 * @ODM\EmbeddedDocument
 *
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test 
 */
class Basic extends AbstractProduct
{
    public function increaseJobCount()
    {
        if (10 == $this->jobCount) {
            throw new \Exception('Maximum amount of jobs exceeded.');
        }

        parent::increaseJobCount();
    }

    public function hasAvailableJobAmount()
    {
        return 0 < ( 10 - $this->jobCount );
    }

}