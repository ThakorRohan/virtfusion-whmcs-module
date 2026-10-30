<?php

namespace WHMCS\Module\Server\VirtFusionDirect;

use WHMCS\Database\Capsule as DB;

/**
 * Readable names for new servers: "vps-" + adjective + "-" + noun, e.g. vps-amber-falcon.
 *
 * WHY A LOCAL WORD LIST
 * ---------------------
 * The name is chosen during provisioning, so it must never wait on or fail because of a
 * third-party service. The words live here, in OPcache, with no I/O at all.
 *
 * WHAT GOES IN THE LISTS
 * ----------------------
 * Positive or neutral adjectives, and concrete nouns (animals, plants, landscape, sky,
 * minerals, objects, places, music). Left out on purpose: negative or "slow/broken" words,
 * body, religious, drug, weapon and brand words, people, primates and pests, so any random
 * pair reads cleanly on an invoice. Every word is 3-10 lowercase letters and the two lists
 * share no word; tests/server-name-check.php enforces both. The longest name (25 chars) is
 * still a valid DNS label, in case the customer later uses it as a hostname.
 *
 * UNIQUENESS
 * ----------
 * Checked against tblhosting.domain, which ConfigureService::initServerBuild() fills with
 * the name once VirtFusion accepts the build. Older "vps-<8 hex>" names can never match
 * this format (hex has no hyphen), so they need no backfill.
 */
class ServerName
{
    /** Draws before giving up on a free pair and adding a hex suffix instead. */
    private const TRIES = 10;

    public const ADJECTIVES = <<<'WORDS'
        amber azure beige cerulean cobalt coral crimson cyan indigo ivory jade lilac magenta
        mauve ochre olive pearl russet sable saffron scarlet sepia sienna teal umber violet
        aqua blue green gray silver golden bronze copper platinum titanium chrome lavender
        turquoise vermilion carmine cerise fuchsia rosy tawny auburn hazel khaki navy maroon
        burgundy verdant charcoal orange purple pastel neon
        bright radiant shiny shining glowing gleaming glossy lucid luminous lustrous sparkling
        vivid brilliant dazzling twinkling starry sunny sunlit moonlit starlit glinting
        glimmering shimmering beaming lucent clear crisp polished prismatic iridescent opaline
        pearly
        misty breezy windy stormy snowy frosty rainy cloudy balmy mild dewy wintry vernal
        summery autumnal tropical arctic alpine coastal polar boreal lunar solar stellar cosmic
        astral orbital galactic celestial oceanic marine maritime sandy rocky mossy leafy
        grassy woody wooded forested floral rustic earthen northern southern eastern western
        tidal glacial volcanic
        agile alert amiable ardent artful astute avid brave bold brisk buoyant calm candid
        capable careful cheerful cheery chipper civil classy clever cordial curious dapper
        daring dashing dauntless decisive deft devoted diligent discreet dynamic eager earnest
        elated elegant eloquent eminent energetic epic exact expert faithful famous fancy
        fearless festive fervent fiery fleet flexible fluent focused fond frank free fresh
        friendly frugal gallant genial gentle genuine gifted glad gleeful gracious grand
        grateful hardy hearty helpful heroic honest hopeful humble ideal jolly jovial joyful
        joyous jubilant just keen kind kindly lavish lively loyal lucky lyrical magical
        majestic mellow merry mighty mindful modern modest musical mystic natural neat nimble
        noble novel patient peaceful perky plucky poetic polite precise prime proud prudent
        quick quiet rapid ready regal reliable resolute rich robust royal rugged savvy serene
        sharp sincere sleek smart smooth snappy snug solid sonic spirited splendid sporty spry
        stable stately steady sterling stoic strong sturdy suave sublime subtle super superb
        supreme swift tactful thrifty tidy timely tranquil true trusty upbeat valiant vibrant
        vigilant vigorous vital warm wise witty wondrous worthy zany zealous zesty zippy happy
        cozy cool chilly brainy bubbly chatty dreamy feisty gutsy handy jaunty jazzy lofty
        loving nifty peppy quirky sassy tough trendy unique youthful bouncy chirpy comfy dandy
        dainty snazzy spiffy swanky groovy funky cheeky
        velvet velvety silken silky satin woolen wooden glassy feathery fluffy fuzzy downy
        woven braided gilded jeweled oaken linen quilted tufted rippled frosted glazed
        burnished brushed forged carved etched molten sculpted tiled spiral curly wavy round
        square oval angular coiled layered patterned striped spotted dappled speckled freckled
        plaid tartan paisley crystal marbled beaded knitted corded ribbed fringed ruffled
        scalloped fluted latticed inlaid enameled lacquered varnished ceramic terracotta
        leathery suede tweed denim cashmere flannel chenille muslin damask
        giant great vast tall towering boundless endless infinite mega colossal ample massive
        jumbo titanic
        humming ringing rustling chiming melodic tuneful whistling echoing sonorous harmonic
        rhythmic acoustic choral hushed whispering
        speedy flying soaring gliding rolling racing drifting floating roaming wandering
        leaping dancing spinning turbo swirling twirling bounding skipping sailing cruising
        diving climbing rising prancing galloping hovering zooming orbiting
        early timeless eternal evergreen ancient classic vintage retro new seasonal perennial
        tangy minty sweet savory spiced honeyed sugary fragrant aromatic peppery smoky toasty
        crunchy crispy citrus herbal
        secret hidden arcane quantum atomic electric magnetic kinetic digital analog binary
        primal central urban rural civic nautical naval aerial airy steep blazing
        abundant active adept alive amazing ambient apt assured athletic august awake aware
        blissful blithe blooming blossoming bountiful bronzed busy candied capital carefree
        caring charming cherished chief clean coherent colorful comic compact composed
        confident content courteous crafted creative cultured delicate delightful deluxe
        dependable dignified distant driven dulcet dutiful durable eclectic edgy efficient
        elastic elemental elfin elite enchanted enduring engaging enormous equal ethereal
        excellent fabled fabulous fantastic fast firm first fit flawless fluid foremost formal
        fortunate fruitful gigantic glamorous glorious gorgeous graceful guiding handsome
        harmonious healthy idyllic imperial inventive knowing laughing legendary level light
        likable limitless liquid living lovely main marvelous maximal measured mobile moving
        mystical nocturnal notable optimal opulent orderly organic original outgoing pacific
        palatial paramount perfect placid playful pleasant plentiful plush popular positive
        powerful practical precious premium pristine prized profound prolific prominent prompt
        pure quaint rare rational refined relaxed renewed restful roaring rousing safe salient
        scenic secure select simple skilled skillful smiling soft soothing special spotless
        stalwart steadfast still striking stunning stylish talented tasteful terrific thankful
        thorough thriving tireless treasured trim trusted ultimate unbroken united upright
        uplifting useful utmost valued versatile welcome whimsical wholesome wild willing
        winning winsome wonderful worldly zen
        WORDS;

    public const NOUNS = <<<'WORDS'
        aardvark alpaca antelope armadillo badger bat bear bison bobcat buffalo camel caribou
        cheetah chinchilla chipmunk coyote deer dingo dolphin dormouse elk elephant ermine
        ferret fox gazelle gerbil giraffe gopher hamster hare hedgehog hippo ibex impala
        jackrabbit kangaroo koala leopard lion llama lynx marmot marten meerkat mink mole
        mongoose moose mouse muskox narwhal ocelot okapi opossum orca otter panda panther
        pangolin platypus porcupine porpoise possum quokka rabbit reindeer rhino seal serval
        sheep squirrel stoat tapir tiger vole wallaby walrus whale wildcat wolf wolverine
        wombat yak zebra beluga dugong manatee caracal civet coati dikdik eland gnu gemsbok
        jerboa kinkajou kudu markhor nilgai numbat oryx pika quoll saiga springbok takin vicuna
        wapiti zebu bandicoot binturong fennec fossa genet hyrax margay mara pudu sitatunga
        tenrec aoudad bushbuck chamois duiker gaur gerenuk mouflon muntjac nyala pronghorn
        steenbok topi urial aardwolf addax agouti anteater mammoth
        beagle boxer collie corgi dalmatian labrador poodle pug retriever setter spaniel
        terrier whippet greyhound dachshund mastiff akita basenji borzoi briard samoyed shiba
        saluki vizsla sphynx ragdoll tabby calico palomino appaloosa clydesdale pinto
        percheron
        albatross avocet bittern bluebird bunting buzzard canary cardinal cassowary chickadee
        condor cormorant crane crow curlew dove dunlin eagle egret eider emu falcon finch
        flamingo flicker gannet goldfinch goose goshawk grebe grouse gull harrier hawk heron
        hoopoe hornbill ibis jackdaw jay kestrel kingfisher kite kiwi lapwing lark linnet
        macaw magpie mallard martin merlin nightjar nuthatch oriole osprey ostrich owl
        parakeet parrot partridge peacock pelican penguin petrel pheasant pigeon plover puffin
        quail raven redstart robin rook sandpiper skylark snipe sparrow starling stork swallow
        swan tanager tern thrush toucan towhee wagtail warbler waxwing wren kookaburra
        lorikeet myna nene pipit quetzal rhea roadrunner shrike siskin skua sunbird takahe
        trogon turaco weaver whimbrel kea kakapo junco grosbeak godwit fulmar gadwall hobby
        kittiwake merganser moorhen ortolan pochard ptarmigan razorbill smew wigeon peregrine
        abalone anchovy angelfish barracuda bluefin carp catfish clam cod conch cowrie
        cuttlefish eel flounder grouper guppy haddock halibut herring jellyfish kelp koi krill
        lobster mackerel manta marlin minnow mussel nautilus octopus oyster perch pike pollock
        prawn puffer remora salmon sardine scallop seahorse shark snapper sponge squid
        starfish stingray sturgeon sunfish swordfish tarpon trout tuna turbot urchin wahoo
        whelk wrasse zander anemone axolotl barnacle dory
        bee beetle bumblebee butterfly cicada cricket damselfly dragonfly firefly honeybee
        katydid ladybird ladybug mantis moth scarab mayfly lacewing
        gecko iguana chameleon tortoise turtle terrapin newt frog salamander python cobra anole
        skink tuatara caiman gharial
        acacia alder almond aspen balsa bamboo banyan baobab beech birch boxwood cedar chestnut
        cypress dogwood elm fir ginkgo hawthorn hickory holly juniper larch laurel linden
        magnolia mahogany maple mimosa myrtle oak palm pine poplar redwood rowan sequoia spruce
        sycamore tamarind teak walnut willow yew cottonwood hornbeam jacaranda kauri mangrove
        mulberry quince sassafras sumac tupelo wisteria buckeye catalpa ironwood nutmeg pear
        pecan sandalwood
        aster azalea begonia bluebell buttercup camellia carnation clover crocus daffodil
        dahlia daisy fern foxglove freesia gardenia geranium heather hibiscus hyacinth iris ivy
        jasmine lily lotus lupine marigold orchid peony petunia primrose rose snowdrop
        sunflower thistle tulip verbena zinnia acanthus agave aloe amaryllis bramble briar
        cactus calla edelweiss fennel flax gorse hollyhock jonquil lichen lobelia moss nettle
        papyrus primula protea reed sedge sorrel tansy thyme trillium yarrow wheat barley
        millet rye basil mint rosemary oregano parsley dill chive tarragon marjoram chamomile
        lemongrass bracken heath bonsai lantana salvia alyssum columbine gladiolus hosta
        larkspur nasturtium phlox snapdragon
        apricot avocado blueberry citron currant fig grape guava kumquat lemon lime lychee
        mango mandarin nectarine papaya persimmon pineapple pomelo raisin raspberry tangerine
        cashew hazelnut pistachio anise cardamom cinnamon clove cocoa coffee cumin honey
        paprika pepper vanilla caramel toffee truffle nougat praline marzipan brioche pretzel
        waffle pancake mochi sorbet gelato scone strudel chai matcha espresso latte mocha
        cider nectar miso wasabi sesame pesto salsa tahini ginseng licorice sherbet fudge
        macaron
        atoll bay bayou beach bluff brook butte canyon cape cascade cavern cliff coast cove
        crag crater creek delta dune estuary fjord geyser glacier glade glen gorge grotto gulf
        harbor highland hill inlet island isle isthmus jungle knoll lagoon lake ledge marsh
        meadow mesa moor mountain oasis ocean peak plain plateau pond prairie rapids ravine
        reef ridge river savanna shore sierra slope spring steppe strait stream summit taiga
        tarn terrace thicket tundra valley vale volcano waterfall wetland woodland arroyo
        basin caldera canal cenote channel chasm cirque dell drumlin fen firth foothill forest
        grove gully hamlet headland islet karst lowland massif moraine orchard outcrop paddock
        pasture pinnacle quarry rill shoal tor trail upland wadi weald wold alcove arbor beck
        cay combe copse corrie dale eddy holm lea loch mere nook scree shingle strand swale
        tide vista rivulet meander iceberg floe snowfield boulder pebble cobble
        aurora breeze cloud comet dawn dusk eclipse equinox galaxy gale halo horizon lightning
        meteor mist moon moonbeam nebula nova planet pulsar quasar rainbow sky solstice star
        stardust starlight sun sunbeam sunrise sunset supernova thunder twilight zenith zephyr
        monsoon tempest drizzle frost vapor cirrus cumulus nimbus stratus sunshine daybreak
        nightfall midnight noon morning evening asteroid satellite crescent apogee parsec
        lightyear photon proton quark atom plasma spectrum prism laser beacon lantern
        orion vega lyra sirius polaris rigel altair deneb andromeda pegasus draco hydra
        phoenix aquila cygnus perseus auriga carina sagitta capella arcturus antares
        betelgeuse aldebaran procyon spica castor pollux mira titan europa callisto ganymede
        triton oberon umbriel charon ceres vesta juno pallas eris mercury venus mars jupiter
        saturn neptune pluto luna terra
        agate amethyst aquamarine beryl citrine diamond emerald garnet jasper lapis malachite
        moonstone obsidian onyx opal peridot quartz ruby sapphire spinel sunstone tanzanite
        topaz tourmaline zircon jadeite basalt granite marble slate flint pumice shale mica
        geode cinnabar feldspar gypsum chalk iron nickel zinc graphite carbon silicon argon
        xenon krypton helium lithium boron pyrite galena azurite fluorite calcite dolomite
        alabaster bismuth
        anchor anvil atlas banner barrel basket bell bellows bench blanket bobbin bracelet
        bridge brush bucket buckle button cabin cable candle canoe canvas caravan carousel
        cart castle chariot chime chisel clock compass cradle crayon crown cushion dial drum
        easel engine feather flag flute forge fountain gadget gazebo gear globe goblet gondola
        gong hammer harp hatch helm hinge hourglass jigsaw kayak kettle key ladder lamp
        lattice lens lever locket loom magnet mallet map mast medal mirror mosaic oar paddle
        pagoda palette parasol pendulum piano pillow pinwheel piston pixel plume pulley puzzle
        quill quilt radar raft ribbon rocket rudder saddle sail satchel scroll sextant shield
        shovel signal sled sledge slipper spindle spire spool spyglass stencil sundial tablet
        telescope thimble throne tiara timber torch tower trellis trophy trumpet tunnel
        turbine turret vessel violin wagon wheel whistle windmill yacht yarn zipper abacus
        acorn amulet antenna arch badge balloon banjo barge baton bobsled bonnet bracket brick
        bubble cairn camera capsule carriage cello citadel clarinet coin column cookie cornet
        cottage crate cymbal diadem domino drone dynamo ember emblem fiddle fresco galleon
        gauge glider guitar harmonica hearth helix igloo jetty jewel journal kiln locomotive
        lute mandolin marimba marquee medallion metronome monolith mural obelisk ocarina
        pavilion pennant periscope pillar plinth portal pottery pyramid rampart relic rotor
        saxophone scepter schooner scooter shell shuttle signet sitar skiff sloop sonar spark
        sphere sphinx statue tambourine tapestry teacup tent tiller token trinket tripod tuba
        ukulele vane viola voyager wand wharf wicker zither
        academy arcade atrium aviary balcony bastion bazaar boulevard bungalow chalet
        courtyard dock dome fortress garden gateway granary greenhouse hacienda hangar haven
        homestead inn kiosk library lighthouse lodge manor marina market mill outpost palace
        parlor pier plaza port quay ranch refuge retreat rotunda shelter studio theater villa
        vineyard workshop arena atelier bakery barn boathouse camp campus canopy carnival
        cellar circus corridor crossing depot embassy estate farmhouse ferry fort forum foundry
        gallery garage guild hall hostel hut landing loft lounge mansion museum nursery outlook
        pantry patio porch pueblo road sawmill seaport skyline station tavern township village
        zoo
        airship bicycle biplane blimp boat buggy caravel catamaran clipper coach cruiser
        cutter dinghy frigate ketch liner longboat monorail rover sailboat sleigh steamer
        submarine tandem tanker tram trawler trolley tugboat zeppelin
        anthem aria ballad cadence carol chord chorus concerto crescendo duet echo encore etude
        fanfare finale harmony jingle lullaby lyric madrigal medley melody minuet motet
        nocturne octave opera overture prelude quartet refrain rhapsody rhythm serenade sonata
        sonnet symphony tempo timbre tune verse waltz ballet bolero cantata fugue gavotte
        mazurka polka rondo samba tango toccata yodel
        legend voyage quest odyssey venture journey blaze glow gleam glint flare ripple whisper wonder marvel riddle enigma cipher fable myth saga tale story
        idea dream vision pulse vertex vector matrix nexus axis apex origin frontier meridian
        equator tropic latitude longitude
        dragon griffin unicorn kraken centaur chimera wyvern golem sprite pixie gnome yeti
        sasquatch dryad selkie minotaur kelpie valkyrie
        WORDS;

    /**
     * A name no service uses yet. Never throws: if the lookup fails the first draw is used
     * unchecked, and if every draw is taken a 4-hex suffix keeps it moving.
     *
     * @param  callable(string): bool|null  $isTaken  Defaults to a tblhosting.domain lookup.
     */
    public static function generate(?callable $isTaken = null): string
    {
        $isTaken ??= fn (string $name): bool => DB::table('tblhosting')->where('domain', $name)->exists();

        try {
            for ($i = 0; $i < self::TRIES; $i++) {
                $name = self::random();
                if (! $isTaken($name)) {
                    return $name;
                }
            }

            return $name . '-' . bin2hex(random_bytes(2));
        } catch (\Throwable $e) {
            Log::insert(__FUNCTION__, [], $e->getMessage());

            return self::random();
        }
    }

    /** One random adjective-noun pair, unchecked. */
    public static function random(): string
    {
        $adjectives = self::words(self::ADJECTIVES);
        $nouns = self::words(self::NOUNS);

        return 'vps-' . $adjectives[random_int(0, count($adjectives) - 1)] . '-' . $nouns[random_int(0, count($nouns) - 1)];
    }

    /** @return list<string> */
    public static function words(string $list): array
    {
        return preg_split('/\s+/', trim($list), -1, PREG_SPLIT_NO_EMPTY);
    }
}
