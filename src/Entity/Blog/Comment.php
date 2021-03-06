<?php

namespace App\Entity\Blog;

use App\Entity\StringUuidTrait;
use App\Entity\User\User;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity)
 */
class Comment
{
    use StringUuidTrait;

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var UuidInterface
     * @ORM\Column(type="uuid")
     */
    protected $uuid;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotNull
     * @Assert\NotBlank
     */
    protected $content;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User\User", inversedBy="comments")
     * @Assert\NotNull
     */
    protected $author;

    /**
     * @var Post
     * @ORM\ManyToOne(targetEntity="App\Entity\Blog\Post", inversedBy="comments")
     * @Assert\NotNull
     */
    protected $post;

    public function __construct()
    {
        $this->uuid = Uuid::uuid4();
    }
}
