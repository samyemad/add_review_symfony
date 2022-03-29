<?php
namespace App\Service\Serializer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\Service\Interfaces\SerializerNormalizeManagerInterface;

class SerializerNormalizeManager implements  SerializerNormalizeManagerInterface
{

    public function generate($serializer,$entity,$groupName): array
    {
        $data=$serializer->normalize($entity,null,[AbstractObjectNormalizer::SKIP_NULL_VALUES => true,'groups' => $groupName]);
        return $data;
    }
}