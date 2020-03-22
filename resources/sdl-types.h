
// =====================================================================================================================
//  SDL Type Definitions
// =====================================================================================================================

typedef int8_t Sint8;
typedef uint8_t Uint8;
typedef int16_t Sint16;
typedef uint16_t Uint16;
typedef int32_t Sint32;
typedef uint32_t Uint32;
typedef int64_t Sint64;
typedef uint64_t Uint64;

typedef struct SDL_RWops {
  Sint64 ( *size)(struct SDL_RWops* context);
  Sint64 ( *seek)(struct SDL_RWops* context, Sint64 offset, int whence);
  size_t ( *read)(struct SDL_RWops* context, void* ptr, size_t size, size_t maxnum);
  size_t ( *write)(struct SDL_RWops* context, const void* ptr, size_t size, size_t num);
  int ( *close)(struct SDL_RWops* context);
  Uint32 type;
  union {
    struct {
      int append;
      void* h;
      struct {
        void* data;
        size_t size;
        size_t left;
      } buffer;
    } windowsio;
    struct {
      Uint8 *base;
      Uint8 *here;
      Uint8 *stop;
    } mem;
    struct {
      void* data1;
      void* data2;
    } unknown;
  } hidden;
} SDL_RWops;

typedef struct SDL_Renderer SDL_Renderer;

typedef struct SDL_Texture SDL_Texture;

typedef struct SDL_Rect {
  int x, y;
  int w, h;
} SDL_Rect;

typedef struct SDL_Version {
  Uint8 major;
  Uint8 minor;
  Uint8 patch;
} SDL_Version;

typedef struct SDL_Color {
  Uint8 r;
  Uint8 g;
  Uint8 b;
  Uint8 a;
} SDL_Color;

typedef struct SDL_Palette {
  int ncolors;
  SDL_Color* colors;
  Uint32 version;
  int refcount;
} SDL_Palette;

typedef struct SDL_PixelFormat {
  Uint32 format;
  SDL_Palette* palette;
  Uint8 BitsPerPixel;
  Uint8 BytesPerPixel;
  Uint8 padding[2];
  Uint32 Rmask;
  Uint32 Gmask;
  Uint32 Bmask;
  Uint32 Amask;
  Uint8 Rloss;
  Uint8 Gloss;
  Uint8 Bloss;
  Uint8 Aloss;
  Uint8 Rshift;
  Uint8 Gshift;
  Uint8 Bshift;
  Uint8 Ashift;
  int refcount;
  struct SDL_PixelFormat* next;
} SDL_PixelFormat;

typedef struct SDL_Surface {
  Uint32 flags;
  SDL_PixelFormat* format;
  int w, h;
  int pitch;
  void* pixels;
  void* userdata;
  int locked;
  void* lock_data;
  SDL_Rect clip_rect;
  struct SDL_BlitMap* map;
  int refcount;
} SDL_Surface;
